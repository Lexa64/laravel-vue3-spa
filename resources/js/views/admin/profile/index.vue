<template>
    <div class="card border-0">
        <div class="card-header bg-transparent">
            <h5 class="float-start">{{ $t('profile.profile') }}</h5>
        </div>
        <div class="card-body">
            <form @submit.prevent="submitForm">
                <div class="mb-3">
                    <label for="name" class="form-label">{{ $t('profile.name') }}</label>
                    <input type="text" v-model="profile.name" class="form-control" id="name">
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
                    <label for="email" class="form-label">{{ $t('profile.email') }}</label>
                    <input type="email" v-model="profile.email" class="form-control" id="email">
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
                    <button :disabled="isLoading" class="btn btn-primary">
                        <div v-show="isLoading" class=""></div>
                        <span v-if="isLoading">{{ $t('profile.in_progress') }}</span>
                        <span v-else>{{ $t('profile.update') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import {onMounted, reactive, watchEffect} from "vue";
import {configure, defineRule, useField, useForm} from "vee-validate";
import {min} from '@vee-validate/rules';
import {email as emailCheck} from '@vee-validate/rules';
//import {required} from "@/validation/rules"
import useProfile from "@/composables/profile";
import {useI18n} from 'vue-i18n';

const {t} = useI18n();

//defineRule('required', required);
defineRule('required', value => {
    if (!value || !value.length) {
        return t('global_validation.required');
    }
    return true;
});

defineRule('min', min);
defineRule('email', emailCheck);

configure({
    generateMessage: ({rule, field}) => {
        const messages = {
            min: t("global_validation.min", {
                field: t("profile." + field),
                min: rule.params[0],
            }),
            email: t("global_validation.email", {
                email: t("profile." + field),
            }),
        }

        return messages[rule.name];
    }
});

const schema = {
    name: 'required|min:3',
    email: 'required|email',
}

const {validate, errors} = useForm({validationSchema: schema});

// Define actual fields for validation
const {value: name} = useField('name', null, {initialValue: ''});
const {value: email} = useField('email', null, {initialValue: ''});
const {profile: profileData, getProfile, updateProfile, validationErrors, isLoading} = useProfile();

const profile = reactive({
    name,
    email
});

function submitForm() {
    validate().then(form => {
        if (form.valid) {
            updateProfile(profile);
        }
    });
}

onMounted(() => {
    getProfile();
});

watchEffect(() => {
    profile.name = profileData.value.name;
    profile.email = profileData.value.email;
});
</script>
