import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'homeView',
      component: () => import('../views/HomeView.vue'),
    },
    {
      path: '/login',
      name: 'loginView',
      component: () => import('../views/LoginView.vue'),
    }
    ,
    {
      path: '/signup',
      name: 'signupView',
      component: () => import('../views/SignupView.vue'),
    },
    {
      path: '/admin',
      name: 'adminDashboard',
      component: () => import('../views/DashboardAdmin.vue'),
    },
    {
      path: '/client',
      name: 'clientDashboard',
      component: () => import('../views/DashboardClient.vue'),
    },
    {
      path: '/livreur',
      name: 'livreurDashboard',
      component: () => import('../views/DashboardLivreur.vue'),
    },
    {
      path: '/notifications',
      name: 'notificationsView',
      component: () => import('../views/NotificationsView.vue'),
    },
  ],
})

export default router
