<template>
    <nav class="navbar navbar-expand-lg sticky-top flex-md-nowrap shadow-sm" style="background-color: white; height: 80px;">
        <div class="container-fluid d-flex justify-content-between align-items-center px-4">
            <div class="d-flex align-items-center">
                <img :src="'/images/logo.png'" height="50px" alt="Logo">
                <span class="ms-3 fs-3 fw-medium" style="font-family: 'Montserrat', system-ui, sans-serif; color: #006B71;">
            РУП СТРОЙТЕХНОРМ
        </span>
            </div>
            <div class="text-center me-5">
                <div class="text-dark fs-5 fw-medium lh-sm">
                    Номер телефона для справок: сектор технической оценки<br>
                    пригодности строительных материалов, изделий, систем и средств<br>
                    +375 17 363-23-86
                </div>
            </div>
<!--            <router-link to="/" class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 nuxt-link-active mini">
                <span>{{ $t('admin_navbar.company_name') }}</span>
            </router-link>-->
<!--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>-->
<!--            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
&lt;!&ndash;                    <LocaleSwitcher/>&ndash;&gt;

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{ user.name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                            <li>
                                <router-link :to="{ name: 'profile.index' }" class="dropdown-item">
                                    {{ $t('admin_navbar.profile') }}
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'profile.index' }" class="dropdown-item">
                                    {{ $t('admin_navbar.settings') }}
                                </router-link>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" :class="{ 'opacity-25': processing }" :disabled="processing"
                                   href="javascript:void(0)" @click="logout">{{ $t('admin_navbar.logout') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>-->
        </div>
    </nav>
</template>

<script setup>
import {computed} from "vue";
import {useStore} from 'vuex';
import useAuth from "@/composables/auth";
import LocaleSwitcher from "../../components/LocaleSwitcher.vue";

const store = useStore();
const user = computed(() => store.state.auth.user);
const {processing, logout} = useAuth();
</script>

<style scoped>

</style>
