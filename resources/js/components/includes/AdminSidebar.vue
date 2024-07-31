<template>
    <nav class="bg-light-subtle sidebar">
        <div class="pt-3 sidebar-sticky">
            <ul id="menu" class="nav flex-column mb-2">
                <li class="nav-item">
                    <router-link to="/admin" class="nav-link">
                        <i class="bi bi-pc-display-horizontal"></i>
                        <span class="d-none d-sm-inline ps-2 text-dark">{{ $t('main_page.dashboard')}}</span>
                    </router-link>
                </li>
                <li v-if="can('user-list')" class="nav-item">
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link">
                        <i class="bi bi-person-workspace"></i>
                        <span class="d-none d-sm-inline ps-2 text-dark">{{ $t('admin_sidebar.user_manager')}}</span>
                        <i class="bi bi-chevron-expand float-end"></i>
                    </a>
                    <ul class="collapse nav ms-1" id="submenu2" data-bs-parent="#menu">
                        <li v-if="can('user-list')" class="nav-link container">
                            <router-link :to="{ name: 'users.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-person-vcard"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">{{ $t('admin_sidebar.list')}}</span>
                            </router-link>
                        </li>
                        <li v-if="can('permission-list')" class="nav-link container rounded-pill">
                            <router-link :to="{ name: 'permissions.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-shield-lock"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">{{ $t('admin_sidebar.permissions')}}</span>
                            </router-link>
                        </li>
                        <li v-if="can('role-list')" class="nav-link container">
                            <router-link :to="{ name: 'roles.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-motherboard"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">{{ $t('admin_sidebar.roles')}}</span>
                            </router-link>
                        </li>
                    </ul>
                </li>
                <!--<li v-if="can('post-list')" class="nav-item">
                    <router-link :to="{ name: 'posts.index' }" class="nav-link">
                        <i class="bi bi-emoji-wink"></i>
                        <span class="d-none d-sm-inline ps-2 text-dark">Posts</span>
                    </router-link>
                </li>
                <li v-if="can('category-list')" class="nav-item">
                    <router-link :to="{ name: 'categories.index' }" class="nav-link">
                        <i class="bi bi-emoji-wink"></i>
                        <span class="d-none d-sm-inline ps-2 text-dark">Categories</span>
                    </router-link>
                </li>-->
            </ul>
        </div>
    </nav>
</template>

<script setup>
import {useAbility} from '@casl/vue'
const {can} = useAbility();
</script>

<style scoped>
ul.nav a:hover {
    color: black !important;
    background-color: #f8f9fa !important;
}
</style>
