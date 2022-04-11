import VueRouter from 'vue-router'
import Vue from 'vue'

import Index from './views/Index'
import News from './views/News'
import Post from './views/Post'
import CreatePost from './views/CreatePost'
import NotFound from './views/404'
import EditPost from "./views/EditPost";

Vue.use(VueRouter)

const routes = [
    {
        path: '/test',
        component: Index
    },
    {
        path: '/news',
        component: News
    },
    {
        path: "/post", // :id must be here, but something wrong
        component: Post
    },
    {
        path: "/create-post",
        component: CreatePost
    },
    {
        path: "/edit-post",
        component: EditPost
    },
    {
        path: "*",
        component: NotFound
    }
]

export default new VueRouter({
    mode: 'history',
    routes: routes
})
