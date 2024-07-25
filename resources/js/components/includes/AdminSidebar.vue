<template>
    <nav class="bg-white sidebar">
        <div class="pt-3 sidebar-sticky">
            <ul id="menu" class="nav flex-column mb-2">
                <li class="nav-item">
                    <router-link to="/admin" class="nav-link">
                        <i class="bi bi-emoji-wink"></i>
                        <span class="d-none d-sm-inline ps-2 text-dark">Dashboard</span>
                    </router-link>
                </li>
                <li v-if="can('user-list')" class="nav-item">
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link">
                        <i class="bi bi-emoji-wink"></i>
                        <span class="d-none d-sm-inline ps-2 text-dark">User Manager</span>
                    </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                        <li v-if="can('permission-list')" class="nav-link w-100">
                            <router-link :to="{ name: 'permissions.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-emoji-smile"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">Permissions</span>
                            </router-link>
                        </li>
                        <li v-if="can('role-list')" class="nav-link">
                            <router-link :to="{ name: 'roles.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-emoji-smile"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">Roles</span>
                            </router-link>
                        </li>
                        <li v-if="can('user-list')" class="nav-link">
                            <router-link :to="{ name: 'users.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-emoji-smile"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">Users</span>
                            </router-link>
                        </li>
                    </ul>
                </li>
                <li v-if="can('post-list')" class="nav-item">
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
                </li>
            </ul>
        </div>
    </nav>
</template>

<script setup>
import {useAbility} from '@casl/vue'
const {can} = useAbility();
</script>

<style scoped>

</style>
