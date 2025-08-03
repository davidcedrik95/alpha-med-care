<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Configuration CORS
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Répondre aux requêtes OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Charger PHPMailer
require __DIR__ . '/phpmailer/src/Exception.php';
require __DIR__ . '/phpmailer/src/PHPMailer.php';
require __DIR__ . '/phpmailer/src/SMTP.php';

// Configuration SMTP IONOS
$smtpHost = 'smtp.ionos.de';
$smtpPort = 587;
$smtpUsername = 'cedrik.moukam@alpha-med-care.de';
$smtpPassword = 'e93z!TxrsWMZjSr';
$serviceEmail = 'cedrik.moukam@alpha-med-care.de';

// Répertoire de stockage
$uploadDir = __DIR__ . '/uploads/';
if (!file_exists($uploadDir)) {
    if (!mkdir($uploadDir, 0755, true)) {
        die(json_encode(['success' => false, 'error' => 'Failed to create upload directory']));
    }
}

// Fonction de nettoyage
function sanitize($input) {
    if (is_array($input)) {
        return array_map('sanitize', $input);
    }
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

// Journalisation
function log_message($message) {
    file_put_contents(__DIR__ . '/email_log.txt', date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL, FILE_APPEND);
}

try {
    log_message('Début du traitement du formulaire');

    // Vérifier méthode HTTP
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    // Détecter le type de contenu
    $contentType = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
    
    // Traiter les données JSON
    if (strpos($contentType, 'application/json') !== false) {
        $rawData = file_get_contents('php://input');
        $data = json_decode($rawData, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid JSON: ' . json_last_error_msg());
        }
        $postData = $data;
        $filesData = [];
    } 
    // Traiter les données multipart/form-data
    else {
        $postData = $_POST;
        $filesData = $_FILES;
    }

    log_message('Données POST reçues: ' . print_r($postData, true));

    // Récupération des données client
    $formData = [
        'anrede' => sanitize($postData['anrede'] ?? ''),
        'firstname' => sanitize($postData['firstname'] ?? ''),
        'lastname' => sanitize($postData['lastname'] ?? ''),
        'company' => sanitize($postData['company'] ?? ''),
        'phone' => sanitize($postData['phone'] ?? ''),
        'email' => sanitize($postData['email'] ?? ''),
        'address' => sanitize($postData['address'] ?? ''),
        'hausnummer' => sanitize($postData['hausnummer'] ?? ''),
        'plz' => sanitize($postData['plz'] ?? ''),
        'ort' => sanitize($postData['ort'] ?? ''),
        'land' => sanitize($postData['land'] ?? ''),
        'additional' => sanitize($postData['additional'] ?? '')
    ];

    // Validation email
    if (empty($formData['email'])) {
        throw new Exception('Email is required');
    }

    if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Ungültige E-Mail-Adresse');
    }

    // Récupération du nombre d'appareils
    $devicesCount = isset($postData['devices_count']) ? (int)$postData['devices_count'] : 0;
    $devices = [];

    // Récupération des appareils
    for ($i = 0; $i < $devicesCount; $i++) {
        if (isset($postData["devices"][$i])) {
            $devices[] = [
                'manufacturer' => sanitize($postData["devices"][$i]['manufacturer'] ?? ''),
                'model' => sanitize($postData["devices"][$i]['model'] ?? ''),
                'serial' => sanitize($postData["devices"][$i]['serial'] ?? '')
            ];
        }
    }

    log_message("Nombre d'appareils: " . count($devices));

    // Traitement des images
    $imageAttachments = [];
    if (!empty($filesData)) {
        log_message('Fichiers reçus: ' . print_r($filesData, true));
        
        foreach ($filesData as $key => $file) {
            if (preg_match('/devices\[(\d+)\]\[images\]\[(\d+)\]/', $key, $matches)) {
                $deviceIndex = $matches[1];
                $imageIndex = $matches[2];
                
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $filename = uniqid('img_', true) . '.' . $ext;
                    $targetPath = $uploadDir . $filename;
                    
                    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                        $imageAttachments[$deviceIndex][] = [
                            'path' => $targetPath,
                            'name' => $file['name']
                        ];
                        log_message("Fichier déplacé: $targetPath");
                    } else {
                        log_message("Échec du déplacement du fichier: " . $file['tmp_name']);
                    }
                } else {
                    log_message("Erreur de téléchargement: " . $file['error']);
                }
            }
        }
    }

    // 1. Générer l'email pour le service
    $serviceSubject = "Neue Serviceanforderung von {$formData['firstname']} {$formData['lastname']}";
    $serviceMessage = "Kundendaten:\n";
    $serviceMessage .= "Anrede: {$formData['anrede']}\n";
    $serviceMessage .= "Name: {$formData['firstname']} {$formData['lastname']}\n";
    $serviceMessage .= "Firma: {$formData['company']}\n";
    $serviceMessage .= "Telefon: {$formData['phone']}\n";
    $serviceMessage .= "Email: {$formData['email']}\n";
    $serviceMessage .= "Adresse: {$formData['address']} {$formData['hausnummer']}, {$formData['plz']} {$formData['ort']}, {$formData['land']}\n";
    $serviceMessage .= "Zusätzliche Informationen: " . ($formData['additional'] ?: 'Keine') . "\n\n";
    
    $serviceMessage .= "Geräte:\n";
    foreach ($devices as $index => $device) {
        $serviceMessage .= "\nGerät " . ($index + 1) . ":\n";
        $serviceMessage .= "Hersteller: {$device['manufacturer']}\n";
        $serviceMessage .= "Modell: {$device['model']}\n";
        $serviceMessage .= "Seriennummer: {$device['serial']}\n";
        
        if (isset($imageAttachments[$index])) {
            $serviceMessage .= "Anzahl Bilder: " . count($imageAttachments[$index]) . "\n";
        }
    }

    // 2. Générer l'email de confirmation
    $confirmationSubject = "Ihre Serviceanforderung bei Alpha Med Care";
    $confirmationMessage = "Sehr geehrte/r {$formData['anrede']} {$formData['lastname']},\n\n";
    $confirmationMessage .= "vielen Dank für Ihre Serviceanfrage bei Alpha Med Care.\n\n";
    $confirmationMessage .= "Wir haben folgende Anfrage von Ihnen erhalten:\n\n";
    $confirmationMessage .= "Kundendaten:\n";
    $confirmationMessage .= "- Name: {$formData['firstname']} {$formData['lastname']}\n";
    $confirmationMessage .= "- Firma: {$formData['company']}\n";
    $confirmationMessage .= "- Kontakt: {$formData['phone']} / {$formData['email']}\n";
    $confirmationMessage .= "- Adresse: {$formData['address']} {$formData['hausnummer']}, {$formData['plz']} {$formData['ort']}\n\n";
    $confirmationMessage .= "Anzahl der gemeldeten Geräte: " . count($devices) . "\n\n";
    $confirmationMessage .= "Unser Serviceteam wird sich innerhalb von 24 Stunden mit Ihnen in Verbindung setzen,\n";
    $confirmationMessage .= "um einen Termin zu vereinbaren.\n\n";
    $confirmationMessage .= "Mit freundlichen Grüßen,\n";
    $confirmationMessage .= "Ihr Alpha Med Care Team\n\n";
    $confirmationMessage .= "Alpha Med Care GmbH\n";
    $confirmationMessage .= "Tel: +49 (0) 1234 56789\n";
    $confirmationMessage .= "Email: cedrik.moukam@alpha-med-care.de\n";
    $confirmationMessage .= "Web: www.alpha-med-care.com";

    log_message("Préparation de l'email pour le service");

    // Initialiser PHPMailer
    $mail = new PHPMailer(true);
    
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtpPort;
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    
    // Activer le débogage SMTP
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Debugoutput = function($str, $level) {
        log_message("SMTP debug (level $level): $str");
    };
    
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ];

    // 1. Envoyer au service
    $mail->setFrom($smtpUsername, 'Serviceanforderung System');
    $mail->addAddress($serviceEmail);
    $mail->addReplyTo($formData['email'], $formData['firstname'] . ' ' . $formData['lastname']);
    $mail->Subject = $serviceSubject;
    $mail->Body = $serviceMessage;
    $mail->isHTML(false);
    
    // Joindre les images
    foreach ($imageAttachments as $deviceImages) {
        foreach ($deviceImages as $image) {
            $mail->addAttachment($image['path'], $image['name']);
        }
    }
    
    log_message("Tentative d'envoi de l'email au service");
    $mail->send();
    log_message("Email au service envoyé avec succès");
    
    // 2. Envoyer la confirmation au client
    $mail->clearAddresses();
    $mail->clearAttachments();
    $mail->setFrom($smtpUsername, 'Alpha Med Care Service');
    $mail->addAddress($formData['email'], $formData['firstname'] . ' ' . $formData['lastname']);
    $mail->Subject = $confirmationSubject;
    $mail->Body = $confirmationMessage;
    $mail->isHTML(false);
    
    log_message("Tentative d'envoi de l'email de confirmation");
    $mail->send();
    log_message("Email de confirmation envoyé avec succès");

    // Nettoyer les fichiers temporaires
    foreach ($imageAttachments as $deviceImages) {
        foreach ($deviceImages as $image) {
            if (file_exists($image['path'])) {
                unlink($image['path']);
            }
        }
    }

    log_message("Formulaire traité avec succès");

    echo json_encode([
        'success' => true,
        'message' => 'Formular erfolgreich übermittelt!',
        'devices_count' => count($devices)
    ]);

} catch (Exception $e) {
    // Journalisation des erreurs
    $errorMsg = 'Form Processing Error: ' . $e->getMessage();
    log_message($errorMsg);
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Ein Fehler ist aufgetreten: ' . $e->getMessage(),
        'debug_info' => [
            'smtp_host' => $smtpHost,
            'smtp_port' => $smtpPort,
            'smtp_user' => $smtpUsername,
            'devices_count' => $devicesCount ?? 0,
            'files_count' => count($_FILES),
            'post_data' => json_encode($_POST)
        ]
    ]);
}