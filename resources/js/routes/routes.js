import Cookies from 'js-cookie'
import store from "../store";

const AuthenticatedLayout = () => import('../layouts/Authenticated.vue');
const GuestLayout = () => import('../layouts/Guest.vue');

const PostsIndex = () => import('../views/admin/posts/Index.vue');
const PostsCreate = () => import('../views/admin/posts/Create.vue');
const PostsEdit = () => import('../views/admin/posts/Edit.vue');

function requireLogin(to, from, next) {
    let isLogin = false;
    isLogin = !!store.state.auth.authenticated;

    if (isLogin) {
        next();
    } else {
        next('/login');
    }
}

function guest(to, from, next) {
    let isLogin;
    isLogin = !!store.state.auth.authenticated;

    if (isLogin) {
        next('/');
    } else {
        next();
    }
}

export default [
    {
        path: '/',
        // redirect: { name: 'login' },
        component: GuestLayout,
        children: [
            {
                path: '/',
                name: 'home',
                component: () => import('../views/home/index.vue'),
            },
            {
                path: 'posts',
                name: 'public-posts.index',
                component: () => import('../views/posts/index.vue'),
            },
            {
                path: 'posts/:id',
                name: 'public-posts.details',
                component: () => import('../views/posts/details.vue'),
            },
            {
                path: 'category/:id',
                name: 'category-posts.index',
                component: () => import('../views/category/posts.vue'),
            },
            {
                path: 'login',
                name: 'auth.login',
                component: () => import('../views/login/Login.vue'),
                beforeEnter: guest,
            },
            {
                path: 'register',
                name: 'auth.register',
                component: () => import('../views/register/index.vue'),
                beforeEnter: guest,
            },
            {
                path: 'forgot-password',
                name: 'auth.forgot-password',
                component: () => import('../views/auth/passwords/Email.vue'),
                beforeEnter: guest,
            },
            {
                path: 'reset-password/:token',
                name: 'auth.reset-password',
                component: () => import('../views/auth/passwords/Reset.vue'),
                beforeEnter: guest,
            },
        ]
    },
    {
        path: '/admin',
        component: AuthenticatedLayout,
        //meta: {breadCrumb: 'Dashboard'},
        // redirect: {
        //     name: 'admin.index'
        // },
        beforeEnter: requireLogin,
        children: [
            {
                name: 'admin.index',
                path: '',
                component: () => import('../views/admin/index.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.admin'}
            },
            {
                name: 'profile.index',
                path: 'profile',
                component: () => import('../views/admin/profile/index.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.profile'}
            },
            {
                name: 'posts.index',
                path: 'posts',
                component: PostsIndex,
                meta: {breadCrumb: 'breadcrumb_labels_admin.posts'}
            },
            {
                name: 'posts.create',
                path: 'posts/create',
                component: PostsCreate,
                meta: {breadCrumb: 'breadcrumb_labels_admin.add_new_post'}
            },
            {
                name: 'posts.edit',
                path: 'posts/edit/:id',
                component: PostsEdit,
                meta: {breadCrumb: 'breadcrumb_labels_admin.edit_post'}
            },
            {
                name: 'categories.index',
                path: 'categories',
                component: () => import('../views/admin/categories/Index.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.categories'}
            },
            {
                name: 'categories.create',
                path: 'categories/create',
                component: () => import('../views/admin/categories/Create.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.add_new_category'}
            },
            {
                name: 'categories.edit',
                path: 'categories/edit/:id',
                component: () => import('../views/admin/categories/Edit.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.edit_category'}
            },
            {
                name: 'permissions.index',
                path: 'permissions',
                component: () => import('../views/admin/permissions/Index.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.permissions'}
            },
            {
                name: 'permissions.create',
                path: 'permissions/create',
                component: () => import('../views/admin/permissions/Create.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.create_permission'}
            },
            {
                name: 'permissions.edit',
                path: 'permissions/edit/:id',
                component: () => import('../views/admin/permissions/Edit.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.edit_permission'}
            },
            {
                name: 'roles.index',
                path: 'roles',
                component: () => import('../views/admin/roles/Index.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.roles'}
            },
            {
                name: 'roles.create',
                path: 'roles/create',
                component: () => import('../views/admin/roles/Create.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.create_role'}
            },
            {
                name: 'roles.edit',
                path: 'roles/edit/:id',
                component: () => import('../views/admin/roles/Edit.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.edit_role'}
            },
            {
                name: 'users.index',
                path: 'users',
                component: () => import('../views/admin/users/Index.vue'),
                meta: { breadCrumb: 'breadcrumb_labels_admin.users' }
            },
            {
                name: 'users.create',
                path: 'users/create',
                component: () => import('../views/admin/users/Create.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.add_user'}
            },
            {
                name: 'users.edit',
                path: 'users/edit/:id',
                component: () => import('../views/admin/users/Edit.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.edit_user'}
            },
            {
                name: 'projects.index',
                path: 'projects',
                component: () => import('../views/admin/projects/Index.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.projects'}
            },
            {
                name: 'projects.create',
                path: 'projects/create',
                component: () => import('../views/admin/projects/Create.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.projects'}
            },
            {
                name: 'projects.edit',
                path: 'projects/:id/edit',
                component: () => import('../views/admin/projects/Edit.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.projects'},
                props: true
            },
            {
                name: 'tariffs.index',
                path: 'utility_tariffs',
                component: () => import('../views/admin/tariffs/Index.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.tariffs'}
            },
            {
                name: 'tariffs.create',
                path: 'utility_tariffs/create',
                component: () => import('../views/admin/tariffs/Create.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.tariffs'}
            },
            {
                name: 'tariffs.edit',
                path: 'utility_tariffs/:id/edit',
                component: () => import('../views/admin/tariffs/Edit.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.tariffs'},
                props: true
            },
            {
                name: 'costs.index',
                path: 'utility_costs',
                component: () => import('../views/admin/costs/Index.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.costs'}
            },
            {
                name: 'costs.create',
                path: 'utility_costs/create',
                component: () => import('../views/admin/costs/Create.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.costs'}
            },
            {
                name: 'costs.edit',
                path: 'utility_costs/:id/edit',
                component: () => import('../views/admin/costs/Edit.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.costs'},
                props: true
            },
            {
                name: 'estimates.index',
                path: 'cost_estimates',
                component: () => import('../views/admin/estimates/Index.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.estimates'}
            },
            {
                name: 'estimates.create',
                path: 'cost_estimates/create',
                component: () => import('../views/admin/estimates/Create.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.estimates'}
            },
            {
                name: 'estimates.edit',
                path: 'cost_estimates/:id/edit',
                component: () => import('../views/admin/estimates/Edit.vue'),
                meta: {breadCrumb: 'breadcrumb_labels_admin.estimates'},
                props: true
            },
        ]
    },
    {
        path: "/:pathMatch(.*)*",
        name: 'NotFound',
        component: () => import("../views/errors/404.vue"),
    },
];
