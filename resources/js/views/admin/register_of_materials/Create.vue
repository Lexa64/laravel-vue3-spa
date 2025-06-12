<template>
    <div class="row justify-content-center my-5">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <div class="mb-3">
                            <label for="authorized_body" class="form-label">Уполномоченный орган</label>
                            <select v-model="material.authorized_body" id="authorized_body" class="form-control">
                                <option value='' selected disabled>Выберите уполномоченный орган</option>
                                <option value='РУП "СтройМедиаПроект"'>РУП "СтройМедиаПроект"</option>
                                <option value='"РУП "СТРОЙТЕХНОРМ""'>РУП "СТРОЙТЕХНОРМ"</option>
                                <option value='"РУП "Институт БелНИИС""'>РУП "Институт БелНИИС"</option>
                                <option value='"РУП "БИСП" Управление делами Президента Республики Беларусь"'>РУП "БИСП" Управление делами Президента Республики Беларусь</option>
                                <option value='"УП "БелДорНИИ""'>УП "БелДорНИИ"</option>
                                <option value='"УП "Институт НИИСМ""'>УП "Институт НИИСМ"</option>
                                <option value='"РУП "Сертис" РУП "Белстройцентр""'>РУП "Сертис" РУП "Белстройцентр"</option>
                            </select>
                            <div class="text-danger mt-1">
                                {{ errors.authorized_body }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.authorized_body">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="date_of_registration" class="form-label">Дата регистрации</label>
                            <input v-model="material.date_of_registration" id="date_of_registration" type="date" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.date_of_registration }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.date_of_registration">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="valid_until" class="form-label">Действителен до</label>
                            <input v-model="material.valid_until" id="valid_until" type="date" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.valid_until }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.valid_until">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="extended_until" class="form-label">Продлён до</label>
                            <input v-model="material.extended_until" id="extended_until" type="date" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.extended_until }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.extended_until">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name_of_material" class="form-label">Наименование материала (изделия)</label>
                            <input v-model="material.name_of_material" id="name_of_material" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.name_of_material }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.name_of_material">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="appointment" class="form-label">Назначение</label>
                            <input v-model="material.appointment" id="appointment" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.appointment }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.appointment">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="manufacturer" class="form-label">Изготовитель</label>
                            <input v-model="material.manufacturer" id="manufacturer" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.manufacturer }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.manufacturer">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="applicant" class="form-label">Заявитель</label>
                            <input v-model="material.applicant" id="applicant" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.applicant }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.applicant">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="testing_laboratory" class="form-label">Наименование испытательной лаборатории (центра)</label>
                            <select v-model="material.testing_laboratory" id="testing_laboratory" class="form-control">
                                <option value="" selected disabled>Выберите лабораторию</option>
                                <option value="Лаборатория 1">Лаборатория 1</option>
                                <option value="Лаборатория 2">Лаборатория 2</option>
                                <option value="Лаборатория 3">Лаборатория 3</option>
                            </select>
                            <div class="text-danger mt-1">
                                {{ errors.testing_laboratory }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.testing_laboratory">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="protocol_number" class="form-label">Номер протокола</label>
                            <input v-model="material.protocol_number" id="protocol_number" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.protocol_number }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.protocol_number">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="date_expert_opinions" class="form-label">Дата выдачи экспертных заключений</label>
                            <input v-model="material.date_expert_opinions" id="date_expert_opinions" type="date" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.date_expert_opinions }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.date_expert_opinions">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="certificate_is_valid_for" class="form-label">Техническое свидетельство действует на</label>
                            <select v-model="material.certificate_is_valid_for" id="certificate_is_valid_for" class="form-control">
                                <option value="" selected disabled>Выберите вариант</option>
                                <option value="Опция 1">Опция 1</option>
                                <option value="Опция 2">Опция 2</option>
                                <option value="Опция 3">Опция 3</option>
                            </select>
                            <div class="text-danger mt-1">
                                {{ errors.certificate_is_valid_for }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.certificate_is_valid_for">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="special_marks" class="form-label">Особые отметки</label>
                            <input v-model="material.special_marks" id="special_marks" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.special_marks }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.special_marks">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input v-model="material.is_draft" id="is_draft" type="checkbox" class="form-check-input">
                            <label for="is_draft" class="form-check-label">Это черновик?</label>
                            <div class="text-danger mt-1">
                                {{ errors.is_draft }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.is_draft">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button :disabled="isLoading" class="btn btn-primary">
                                <span v-if="isLoading">{{ $t('profile.in_progress') }}</span>
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
import useMaterials from "@/composables/materials";
import {configure, useForm, useField, defineRule} from "vee-validate";
import {min} from '@vee-validate/rules';
import {email as emailCheck} from '@vee-validate/rules';
import {useI18n} from 'vue-i18n';

const {roleList, getRoleList} = useRoles();
const {storeMaterial, validationErrors, isLoading} = useMaterials();
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
    authorized_body: '',
    date_of_registration: '',
    valid_until: '',
    extended_until: '',
    name_of_material: '',
    appointment: '',
    manufacturer: '',
    applicant: '',
    testing_laboratory: '',
    protocol_number: '',
    date_expert_opinions: '',
    certificate_is_valid_for: '',
    special_marks: '',
    is_draft: true
};

const {validate, errors} = useForm({validationSchema: schema})

const {value: authorized_body} = useField('authorized_body', null, {initialValue: ''});
const {value: date_of_registration} = useField('date_of_registration', null, {initialValue: ''});
const {value: valid_until} = useField('valid_until', null, {initialValue: ''});
const {value: extended_until} = useField('extended_until', null, {initialValue: ''});
const {value: name_of_material} = useField('name_of_material', null, {initialValue: ''});
const {value: appointment} = useField('appointment', null, {initialValue: ''});
const {value: manufacturer} = useField('manufacturer', null, {initialValue: ''});
const {value: applicant} = useField('applicant', null, {initialValue: ''});
const {value: testing_laboratory} = useField('testing_laboratory', null, {initialValue: ''});
const {value: protocol_number} = useField('protocol_number', null, {initialValue: ''});
const {value: date_expert_opinions} = useField('date_expert_opinions', null, {initialValue: ''});
const {value: certificate_is_valid_for} = useField('certificate_is_valid_for', null, {initialValue: ''});
const {value: special_marks} = useField('special_marks', null, {initialValue: ''});
const {value: is_draft} = useField('is_draft', null, {initialValue: ''});

const material = reactive({
    authorized_body,
    date_of_registration,
    valid_until,
    extended_until,
    name_of_material,
    appointment,
    manufacturer,
    applicant,
    testing_laboratory,
    protocol_number,
    date_expert_opinions,
    certificate_is_valid_for,
    special_marks,
    is_draft
});

function submitForm() {
    validate().then(form => {
        if (form.valid) {
            storeMaterial(material);
        }
    })
    //storeMaterial(material);
}

onMounted(() => {
    getRoleList();
});

</script>
