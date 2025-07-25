import { createRouter, createWebHistory } from 'vue-router'


const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('@/views/HomeView.vue')
  },

  {
    path: '/services',
    name: 'Services',
    component: () => import('@/views/ServicesView.vue'),
    children: [
      {
        path: 'stk',
        name: 'STK Inspection',
        component: () => import('@/views/services/STKView.vue')
      },
      {
        path: 'mtk',
        name: 'MTK Inspection',
        component: () => import('@/views/services/MTKView.vue')
      }
    ]
  },

  {
    path: '/about',
    name: 'About',
    component: () => import('@/views/AboutView.vue'),
    children: [
      {
        path: 'company',
        name: 'Unternehmen',
        component: () => import('@/views/CompanySection.vue')
      },

      {
        path: 'team',
        name: 'Mittarbeiter',
        component: () => import('@/views/TeamsView.vue')
      },

      {
        path: 'team',
        name: 'Mittarbeiter',
        component: () => import('@/views/TeamsView.vue')
      },

      {
        path: 'partner',
        name: 'ServicePartner',
        component: () => import('@/views/ServicePartner.vue')
      },

      {
        path: 'servicerequest',
        name: 'Serviceanforderung',
        component: () => import('@/views/forms/ServiceRequestForm.vue')
      },

      {
        path: 'installationsupport',
        name: 'Installationsupport',
        component: () => import('@/views/forms/InstallationSupportForm.vue')
      }
    ]
  },

  {
    path: '/contact',
    name: 'ContactView',
    component: () => import('@/views/ContactView.vue')
  },

  {
    path: '/imprint',
    name: 'imprint',
    component: () => import('../views/ImprintView.vue')
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router