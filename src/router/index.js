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
    component: () => import('@/views/AboutView.vue')
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