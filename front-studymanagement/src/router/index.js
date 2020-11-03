import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store';

const Account = () => import(/* webpackChunkName: "account-component" */'../views/Account/Account.vue');

Vue.use(VueRouter);

const ifNotAuthenticated = (to, from, next) => {

  if (!store.getters.authenticated) {
    next()
    return
  }
  next({path : '/dashboard'})
}

const ifAuthenticated = (to, from, next) => {
  if (store.getters.authenticated) {
    next()
    return
  }
  next({path : '/auth'})
}

const routes = [
  {
    path: '/auth',
    name: 'Account',
    beforeEnter: ifNotAuthenticated,
    component: Account
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    beforeEnter: ifAuthenticated,
    component: () => import(/* webpackChunkName: "dashboard" */ '../views/Student/Dashboard'),
  },
  {
    path: '*',
    name: 'NotFound',
    component : () => import(/* webpackChunkName: "404" */ '../views/errors/404'),
  }
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
});

export default router;
