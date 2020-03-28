import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/tables',
      name: 'tables',
      component: () => import('./views/Tables.vue')
    },
    {
      path: '/forms',
      name: 'forms',
      component: () => import('./views/Forms.vue')
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('./views/Profile.vue')
    },
    // client route
    {
      path: '/clients/index',
      name: 'clients.index',
      component: () => import('./views/Clients/ClientsIndex.vue'),
    },
    {
      path: '/clients/new',
      name: 'clients.new',
      component: () => import('./views/Clients/ClientsForm.vue'),
    },
    {
      path: '/clients/:id',
      name: 'clients.edit',
      component: () => import('./views/Clients/ClientsForm.vue'),
      props: true
    },
    // Users route
    {
      path: '/users/index',
      name: 'users.index',
      component: () => import('./views/Users/UsersIndex.vue'),
    },
    {
      path: '/users/new',
      name: 'users.new',
      component: () => import('./views/Users/UsersForm.vue'),
    },
    {
      path: '/users/:id',
      name: 'users.edit',
      component: () => import('./views/Users/UsersForm.vue'),
      props: true
    },
    // Post route
    {
      path: '/posts/index',
      name: 'posts.index',
      component: () => import('./views/Posts/PostsIndex.vue'),
    },
    {
      path: '/posts/new',
      name: 'posts.new',
      component: () => import('./views/Posts/PostsForm.vue'),
    },
    {
      path: '/posts/:id',
      name: 'posts.edit',
      component: () => import('./views/Posts/PostsForm.vue'),
      props: true
    },
    // Comments route
    {
      path: '/comments/index',
      name: 'comments.index',
      component: () => import('./views/Comments/CommentsIndex.vue'),
    },
    {
      path: '/comments/new',
      name: 'comments.new',
      component: () => import('./views/Comments/CommentsForm.vue'),
    },
    {
      path: '/comments/:id',
      name: 'comments.edit',
      component: () => import('./views/Comments/CommentsForm.vue'),
      props: true
    },
    // category route
    {
      path: '/categories/index',
      name: 'categories.index',
      component: () => import('./views/Categories/CategoriesIndex.vue'),
    },
    {
      path: '/categories/new',
      name: 'categories.new',
      component: () => import('./views/Categories/CategoriesForm.vue'),
    },
    {
      path: '/categories/:id',
      name: 'categories.edit',
      component: () => import('./views/Categories/CategoriesForm.vue'),
      props: true
    },
    // tags route
    {
      path: '/tags/index',
      name: 'tags.index',
      component: () => import('./views/Tags/TagsIndex.vue'),
    },
    {
      path: '/tags/new',
      name: 'tags.new',
      component: () => import('./views/Tags/TagsForm.vue'),
    },
    {
      path: '/tags/:id',
      name: 'tags.edit',
      component: () => import('./views/Tags/TagsForm.vue'),
      props: true
    }
  ],
  scrollBehavior (to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { x: 0, y: 0 }
    }
  }
})
