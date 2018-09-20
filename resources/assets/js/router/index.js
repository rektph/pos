import Vue from 'vue'
import Router from 'vue-router'
import HomeComponent from '../components/HomeComponent'
import LoginComponent from '../components/LoginComponent'

Vue.use(Router)

export default new Router({
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return {
        selector: to.hash
        // , offset: { x: 0, y: 10 }
      }
    }
    return savedPosition ? savedPosition : { x: 0, y: 0 }
  },

  routes: [
    {
      path: '/',
      name: 'HomeComponent',
      component: HomeComponent
    },
    {
      path: '/login',
      name: 'LoginComponent',
      component: LoginComponent
    }
  ]
})
