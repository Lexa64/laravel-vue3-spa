<template>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form @submit.prevent="submitLogin">
                            <div class="">
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ $t('login_page.email') }}</label>
                                    <input v-model="loginForm.email" id="email" type="email" class="form-control"
                                           required autofocus autocomplete="username">
                                    <!-- Validation Errors -->
                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.email">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password" class="form-label">
                                        {{ $t('login_page.password') }}
                                    </label>
                                    <input v-model="loginForm.password" id="password" type="password"
                                           class="form-control"
                                           required autocomplete="current-password">
                                    <!-- Validation Errors -->
                                    <div class="text-danger-600 mt-1">
                                        <div v-for="message in validationErrors?.password">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <!-- Remember me -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           v-model="loginForm.remember" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        {{ $t('login_page.remember_me') }}
                                    </label>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary" :class="{ 'opacity-25': processing }"
                                            :disabled="processing">
                                        {{ $t('login_page.login') }}
                                    </button>
                                    <router-link :to="{name: 'auth.forgot-password'}" style="margin-left: 10px;"
                                                 :disabled="processing">
                                        {{ $t('login_page.forgot_password') }}
                                    </router-link>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {useI18n} from 'vue-i18n';
import useAuth from '@/composables/auth';

const {t} = useI18n();
const {loginForm, validationErrors, processing, submitLogin} = useAuth();

</script>
