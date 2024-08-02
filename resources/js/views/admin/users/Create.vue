<template>
    <div class="row justify-content-center my-5">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <div class="mb-3">
                            <label for="post-title" class="form-label">{{ $t('users.name') }}</label>
                            <input v-model="post.name" id="post-title" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.name }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.name">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ $t('users.email') }}</label>
                            <input v-model="post.email" id="email" type="email" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.email }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.email">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ $t('login_page.password') }}</label>
                            <input v-model="post.password" id="password" type="password" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.password }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.password">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="post-category" class="form-label">
                                {{ $t('users.role') }}
                            </label>
                            <v-select v-model="post.role_id" :options="roleList" :reduce="role => role.id" label="name" class="form-control" />
                            <div class="text-danger mt-1">
                                {{ errors.role_id }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.role_id">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button :disabled="isLoading" class="btn btn-primary">
<!--                                <div v-show="isLoading" class=""></div>-->
                                <span v-if="isLoading">{{ $t('profile.in_progress') }}...</span>
                                <span v-else>{{ $t('users.save') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import {onMounted, reactive} from "vue";
import useRoles from "@/composables/roles";
import useUsers from "@/composables/users";
import {configure, useForm, useField, defineRule} from "vee-validate";
//import {required, min} from "@/validation/rules";
import {min} from '@vee-validate/rules';
import {email as emailCheck} from '@vee-validate/rules';
import {useI18n} from 'vue-i18n';

const {roleList, getRoleList} = useRoles();
const {storeUser, validationErrors, isLoading} = useUsers();
const {t} = useI18n();

defineRule('required', value => {
    if (!value || !value.length) {
        return t('global_validation.required');
    }
    return true;
});

defineRule('min', min);
defineRule('email', emailCheck);

configure({
    generateMessage: (context) => {
        const messages = {
            min: t('global_validation.min', {
                field: t('users.' + context.field),
                min: context.rule.params[0],
            }),
            email: t('global_validation.email', {
                email: t('users.' + context.field),
            }),
        }

        return messages[context.rule.name];
    }
});

const schema = {
    name: 'required|min:3',
    email: 'required|email',
    password: 'required|min:8',
}

const {validate, errors} = useForm({validationSchema: schema})

const {value: name} = useField('name', null, {initialValue: ''});
const {value: email} = useField('email', null, {initialValue: ''});
const {value: password} = useField('password', null, {initialValue: ''});
const {value: role_id} = useField('role_id', null, {initialValue: '', label: 'role'});

const post = reactive({
    name,
    email,
    password,
    role_id,
});

function submitForm() {
    validate().then(form => {
        if (form.valid) {
            storeUser(post);
        }
    })
}

onMounted(() => {
    getRoleList();
})
</script>
