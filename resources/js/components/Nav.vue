<template>
    <nav class="navbar navbar-expand-lg sticky-top flex-md-nowrap shadow-sm" style="background-color: #00CCCC;">
        <div class="container-fluid">
            <router-link to="/" class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 nuxt-link-active mini">
                <span>{{ $t('admin_navbar.company_name') }}</span>
            </router-link>
<!--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="ms-auto mb-lg-0">
                    <li class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <LocaleSwitcher/>

                        <ul class="navbar-nav mt-2 mt-lg-0 ms-auto">
                            <template v-if="!user?.name">
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/login">{{ $t('main_page_navbar.login') }}
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/register">{{ $t('main_page_navbar.register') }}
                                    </router-link>
                                </li>
                            </template>
                            <li v-if="user?.name" class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    {{ user.name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                    <li>
                                        <router-link class="dropdown-item" to="/admin">
                                            {{ $t('main_page_navbar.home_page') }}
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="/admin/posts" class="dropdown-item">
                                            {{ $t('main_page_navbar.passports') }}
                                        </router-link>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)"
                                           @click="logout">{{ $t('main_page_navbar.logout') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {useStore} from "vuex";
import useAuth from "@/composables/auth";
import {computed} from "vue";
import LocaleSwitcher from "../components/LocaleSwitcher.vue";

const store = useStore();
const user = computed(() => store.getters["auth/user"]);
const {processing, logout} = useAuth();
</script>

<style scoped>

</style>
