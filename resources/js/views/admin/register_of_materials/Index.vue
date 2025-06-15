<template>
<!--    <div class="row justify-content-center my-2">-->
<!--        <div class="col-md-12">-->
<!--            <div class="card border-0">-->
<!--                <div class="card-header bg-transparent">
                    <h5 class="float-start">Реестр свидетельств</h5>
                    <router-link v-if="can('user-create')" :to="{ name: 'register-of-materials.create' }" class="btn btn-primary btn-sm float-end">
                        Создать новое
                    </router-link>
                </div>-->
<!--                <div class="card-body shadow-sm">-->
<!--                    <div class="mb-4">
                        <input v-model="search_global" type="text" placeholder="Номер протокола + ID"
                               class="form-control w-25">
                    </div>-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <colgroup>
                                <col style="width: 3%">   <!-- ID -->
                                <col style="width: 15%">  <!-- Рег. номер -->
                                <col style="width: 15%">  <!-- Уполномоченный орган -->
                                <col style="width: 16%">  <!-- Наименование продукции -->
                                <col style="width: 15%">  <!-- Производитель -->
                                <col style="width: 12%">  <!-- Заявитель -->
                                <col style="width: 15%">  <!-- Срок действия -->
                                <col style="width: 10%">  <!-- Действия -->
                            </colgroup>
                            <thead>
                            <tr class="search-row" style="--custom-bg: #7CA9CA;">
                                <th colspan="8" class="text-center py-2" style="background-color: var(--custom-bg) !important; font-size: 24px;">
                                    <span style="font-family: 'Montserrat', system-ui, sans-serif; color: white;">
                                        Реестр технических свидетельств пригодности строительных<br>
                                        материалов (изделий) для применения в строительстве
                                    </span>
                                </th>
                            </tr>
                            <!-- Первая строка поиска -->
                            <tr class="search-row" style="--custom-bg: #7CA9CA;">
                                <th colspan="3" style="background-color: var(--custom-bg) !important;">
                                    <vSelect
                                        v-model="search_authorized_body"
                                        :options="authorities"
                                        :reduce="authority => authority.value"
                                        label="text"
                                        placeholder="Уполномоченный орган"
                                        :clearable="true"
                                        class="form-control v-select-custom"
                                    ></vSelect>
                                </th>
                                <th colspan="3" style="background-color: var(--custom-bg) !important;">
                                    <input v-model="search_name_of_material" type="text"
                                           class="form-control"
                                           placeholder="Наименование продукции">
                                </th>
                                <th colspan="2" style="background-color: var(--custom-bg) !important;">
                                    <input v-model="search_date_of_registration" type="date"
                                           class="form-control"
                                           placeholder="Дата регистрации свидетельства">
                                </th>
                            </tr>

                            <!-- Вторая строка поиска -->
                            <tr class="search-row" style="--custom-bg: #7CA9CA;">
                                <th colspan="3" style="background-color: var(--custom-bg) !important;">
                                    <input v-model="search_protocol_number" type="text"
                                           class="form-control"
                                           placeholder="Регистрационный номер свидетельства">
                                </th>
                                <th colspan="3" style="background-color: var(--custom-bg) !important;">
                                    <input v-model="search_applicant" type="text"
                                           class="form-control"
                                           placeholder="Заявитель">
                                </th>
                                <th colspan="2" style="background-color: var(--custom-bg) !important;">
                                    <input v-model="search_valid_until" type="date"
                                           class="form-control"
                                           placeholder="Действительно до">
                                </th>
                            </tr>

                            <tr class="search-row" style="--custom-bg: #7CA9CA;">
                                <th colspan="8" class="text-center py-2" style="background-color: var(--custom-bg) !important;">
                                    <button
                                        type="button"
                                        class="btn"
                                        style="background-color: #D5F7FB !important; border: 2px; border-radius: 56px; margin-left: 10px;"
                                        @click="applyFilters"
                                    >
                                        <i class="bi bi-check-circle"></i> Применить
                                    </button>
                                    <button
                                        type="button"
                                        class="btn"
                                        style="background-color: #D5F7FB !important; border: 2px; border-radius: 56px; margin-left: 10px;"
                                        @click="clearFilters"
                                    >
                                        <i class="bi bi-trash"></i> Сбросить
                                    </button>
                                </th>
                            </tr>

                            <!-- Заголовки столбцов -->
                            <tr>
                                <th class="px-6 py-3 text-start" style="cursor: pointer; background-color: #D5F7FB !important;"
                                    @click="updateOrdering('id')">
                                    <div class="flex flex-row">
                                        <div class="font-medium text-uppercase"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'id' }">
                                            ID
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="cursor: pointer; background-color: #D5F7FB !important;"
                                    @click="updateOrdering('protocol_number')">
                                    <div class="flex flex-row">
                                        <div class="font-medium"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'protocol_number' }">
                                            Регистрационный номер
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="cursor: pointer; background-color: #D5F7FB !important;"
                                    @click="updateOrdering('authorized_body')">
                                    <div class="flex flex-row">
                                        <div class="font-medium"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'authorized_body' }">
                                            Уполномоченный орган
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="cursor: pointer; background-color: #D5F7FB !important;"
                                    @click="updateOrdering('name_of_material')">
                                    <div class="flex flex-row">
                                        <div class="font-medium"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'name_of_material' }">
                                            Наименование продукции
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="cursor: pointer; background-color: #D5F7FB !important;"
                                    @click="updateOrdering('manufacturer')">
                                    <div class="flex flex-row">
                                        <div class="font-medium"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'manufacturer' }">
                                            Производитель
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="cursor: pointer; background-color: #D5F7FB !important;"
                                    @click="updateOrdering('applicant')">
                                    <div class="flex flex-row">
                                        <div class="font-medium"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'applicant' }">
                                            Заявитель
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="cursor: pointer; background-color: #D5F7FB !important;"
                                    @click="updateOrdering('date_of_registration')">
                                    <div class="flex flex-row">
                                        <div class="font-medium"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'date_of_registration' }">
                                            Срок действия
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="background-color: #D5F7FB !important;">
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="material in materials.data" :key="material.id">
                                <td class="px-6 py-4 text-sm">
                                    {{ material.id }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ material.protocol_number }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ material.authorized_body }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ material.name_of_material }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ material.manufacturer }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ material.applicant }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ moment(material.date_of_registration).format('DD.MM.YYYY') + ' - ' + moment(material.valid_until).format('DD.MM.YYYY') }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <router-link v-if="can('user-edit')"
                                                 style="background-color: #7CA9CA !important; border: 2px; border-radius: 56px;"
                                                 :to="{ name: 'register-of-materials.edit', params: { id: material.id } }"
                                                 class="badge bg-primary">Изменить
                                    </router-link>
                                    <a href="#" v-if="can('user-delete')" @click.prevent="deleteMaterial(material.id)"
                                       class="ms-2 badge bg-danger" style="background-color: #7CA9CA !important; border: 2px; border-radius: 56px;">Удалить</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
<!--                </div>-->
                <div class="card-footer">
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <span class="text-nowrap">Страницы</span>
                        <Pagination
                            :data="materials"
                            :limit="3"
                            class="mt-4"
                            @pagination-change-page="page => getMaterials(
                                page,
                                search_global,
                                search_id,
                                search_authorized_body,
                                search_name_of_material,
                                search_date_of_registration,
                                search_protocol_number,
                                search_applicant,
                                search_valid_until,
                                orderColumn,
                                orderDirection
                            )"
                        />
                    </div>
                </div>

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script setup>
import {ref, onMounted, watch} from "vue";
import useMaterials from "../../../composables/materials";
import {useAbility} from '@casl/vue';
import moment from 'moment';
import _ from 'lodash';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

const search_global = ref('');
const search_id = ref('');
const search_authorized_body = ref('');
const search_name_of_material = ref('');
const search_date_of_registration = ref('');
const search_protocol_number = ref('');
const search_applicant = ref('');
const search_valid_until = ref('');

const orderColumn = ref('date_of_registration');
const orderDirection = ref('desc');

const {materials, getMaterials, deleteMaterial} = useMaterials();
const {can} = useAbility();

onMounted(() => {
    getMaterials();
});

const updateOrdering = (column) => {
    orderColumn.value = column;
    orderDirection.value = (orderDirection.value === 'asc') ? 'desc' : 'asc';
    getMaterials(
        1,

        search_global.value,
        search_id.value,
        search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
}

const applyFilters = () => {
    getMaterials(
        1,

        search_global.value,
        search_id.value,
        search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
}

const clearFilters = () => {
    getMaterials(
        1,

        search_global.value = '',
        search_id.value = '',
        search_authorized_body.value = '',
        search_name_of_material.value = '',
        search_date_of_registration.value = '',
        search_protocol_number.value = '',
        search_applicant.value = '',
        search_valid_until.value = '',

        orderColumn.value,
        orderDirection.value
    );
}

watch(search_global, _.debounce((current, previous) => {
    getMaterials(
        1,
        search_global.value,
        search_id.value,
        search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
}, 200));

watch(search_id, (current, previous) => {
    getMaterials(
        1,
        search_global.value,
        search_id.value,
        search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
});

watch(search_authorized_body, (current, previous) => {
    getMaterials(
        1,
        search_global.value,
        search_id.value,
        search_authorized_body.value === null ? '' : search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
});

watch(search_name_of_material, (current, previous) => {
    getMaterials(
        1,
        search_global.value,
        search_id.value,
        search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
});

watch(search_date_of_registration, (current, previous) => {
    console.log(current)
    getMaterials(
        1,
        search_global.value,
        search_id.value,
        search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
});

watch(search_protocol_number, (current, previous) => {
    getMaterials(
        1,
        search_global.value,
        search_id.value,
        search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
});

watch(search_applicant, (current, previous) => {
    getMaterials(
        1,
        search_global.value,
        search_id.value,
        search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
});

watch(search_valid_until, (current, previous) => {
    getMaterials(
        1,
        search_global.value,
        search_id.value,
        search_authorized_body.value,
        search_name_of_material.value,
        search_date_of_registration.value,
        search_protocol_number.value,
        search_applicant.value,
        search_valid_until.value,

        orderColumn.value,
        orderDirection.value
    );
});

const authorities = [
    { value: 'РУП "СтройМедиаПроект"', text: 'РУП "СтройМедиаПроект"' },
    { value: 'РУП "СТРОЙТЕХНОРМ"', text: 'РУП "СТРОЙТЕХНОРМ"' },
    { value: 'РУП "Институт БелНИИС"', text: 'РУП "Институт БелНИИС"' },
    {
        value: 'РУП "БИСП" Управление делами Президента Республики Беларусь',
        text: 'РУП "БИСП" Управление делами Президента Республики Беларусь'
    },
    { value: 'УП "БелДорНИИ"', text: 'УП "БелДорНИИ"' },
    { value: 'УП "Институт НИИСМ"', text: 'УП "Институт НИИСМ"' },
    { value: 'РУП "Сертис" РУП "Белстройцентр"', text: 'РУП "Сертис" РУП "Белстройцентр"' }
];
</script>

<style scoped>
:deep(.page-item .page-link) {
    color: black;
}

:deep(.page-item.active .page-link) {
    background-color: #7CA9CA;
    border-color: #7CA9CA;
    color: white;
}
/* Стили для строк поиска */
.search-row th {
    padding: 0.5rem !important;
    vertical-align: middle !important;
    background-color: white !important;
    border: none !important;
}

.v-select-custom {
    background-color: white;
    border: 1px solid #ced4da !important;
    border-radius: 0.25rem;
    padding: 0;
}

.v-select-custom .vs__dropdown-toggle {
    border: none !important;
    background: transparent !important;
    padding: 0.375rem 0.75rem !important;
}

.v-select-custom .vs__search,
.v-select-custom .vs__search:focus {
    padding: 0 !important;
    margin: 0 !important;
    border: none !important;
    box-shadow: none !important;
}

.v-select-custom .vs__actions {
    padding: 0 4px 0 0 !important;
}

.action-buttons-row th {
    background-color: blue !important;
    border-bottom: 1px solid black !important;
}

.action-buttons-row .btn {
    padding: 0.25rem 0.75rem;
    font-size: 0.875rem;
}

/* Фикс ширины столбцов */
.table {
    table-layout: fixed;
    width: 100%;
}

.table th {
    background-color: #D8DEDF;
    font-weight: 600;
    text-align: center;
    vertical-align: middle;
}
.table td {
    vertical-align: middle;
}
</style>
