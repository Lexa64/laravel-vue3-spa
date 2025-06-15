<template>
    <nav class="sidebar position-fixed" :class="{'collapsed': isCollapsed}">
        <div class="sidebar-inner">
            <div class="sidebar-toggle" @click="toggleSidebar">
                <i class="bi" :class="isCollapsed ? 'bi-list' : 'bi-x-lg'"></i>
            </div>

            <div class="sidebar-content" v-show="!isCollapsed">

            <ul id="menu" class="nav flex-column mb-2" v-show="!isCollapsed">
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
                <li v-if="can('user-list')" class="nav-item">
                    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link">
                        <i class="bi bi-book"></i>
                        <span class="d-none d-sm-inline ps-2 text-dark">Личный кабинет</span>
                        <i class="bi bi-chevron-expand float-end"></i>
                    </a>
                    <ul class="collapse nav ms-1" id="submenu3" data-bs-parent="#menu">
                        <li v-if="can('user-list')" class="nav-link container rounded-pill">
                            <router-link :to="{ name: 'profile.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-coin"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">Учетная запись</span>
                            </router-link>
                        </li>
                        <li v-if="can('user-list')" class="nav-link container rounded-pill">
                            <router-link :to="{ name: 'register-of-materials.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-coin"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">Реестр свидетельств</span>
                            </router-link>
                        </li>
                        <li v-if="can('user-list')" class="nav-link container rounded-pill">
                            <router-link :to="{ name: 'lifecycles.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-coin"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">Зарегистрировать свидетельство</span>
                            </router-link>
                        </li>
                        <li v-if="can('user-list')" class="nav-link container rounded-pill">
                            <router-link :to="{ name: 'lifecycles.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-coin"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">Мои свидетельства</span>
                            </router-link>
                        </li>
                        <li v-if="can('user-list')" class="nav-link container rounded-pill">
                            <router-link :to="{ name: 'lifecycles.index' }" class="nav-link px-0" style="margin-left: 15px;">
                                <i class="bi bi-coin"></i>
                                <span class="d-none d-sm-inline ps-2 text-dark">Черновики</span>
                            </router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</template>

<script setup>
import {useAbility} from '@casl/vue'
import {ref} from 'vue'

const {can} = useAbility();
const isCollapsed = ref(false);

const emit = defineEmits(['toggle']);
const toggleSidebar = () => {
    isCollapsed.value = !isCollapsed.value;
    emit('toggle', isCollapsed.value); // Важно: это уже есть в вашем коде
};
</script>

<style scoped>
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #f8f9fa;
    transition: width 0.3s ease;
    overflow: hidden;
    position: relative;
}

.sidebar.collapsed {
    width: 50px;
    min-width: 50px;
}

.sidebar-toggle {
    position: absolute;
    top: 0;
    right: 0;
    width: 50px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    background-color: #f8f9fa;
}

.sidebar.collapsed .sidebar-toggle {
    right: 0;
    width: 100%;
}

.bi {
    font-size: 1.2rem;
    color: #6c757d;
}

.bi:hover {
    color: #495057;
}

.sidebar-content {
    padding-top: 40px; /* Отступ для кнопки */
    height: calc(100% - 40px);
    overflow-y: auto;
}

/* Ваши существующие стили меню */
ul.nav a:hover {
    color: black !important;
    background-color: #f8f9fa !important;
}
</style>
