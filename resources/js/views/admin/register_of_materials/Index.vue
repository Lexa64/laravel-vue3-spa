<template>
    <div class="row justify-content-center my-2">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <h5 class="float-start">Реестр свидетельств</h5>
                    <router-link v-if="can('user-create')" :to="{ name: 'register-of-materials.create' }" class="btn btn-primary btn-sm float-end">
                        Создать новое
                    </router-link>
                </div>
                <div class="card-body shadow-sm">
<!--                    <div class="mb-4">
                        <input v-model="search_global" type="text" placeholder="Номер протокола + ID"
                               class="form-control w-25">
                    </div>-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <thead>
                            <tr style="border: none !important; background-color: white !important;">
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                    <vSelect
                                        v-model="search_authorized_body"
                                        :options="authorities"
                                        :reduce="authority => authority.value"
                                        label="text"
                                        placeholder="Уполномоченный орган"
                                        :clearable="true"
                                        class="form-control"
                                    >
                                        <template #option="{ text }">
                                            <span>{{ text }}</span>
                                        </template>
                                    </vSelect>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                    <input v-model="search_name_of_material" type="text"
                                           class="inline-block mt-1 form-control"
                                           placeholder="Наименование продукции">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                    <input v-model="search_date_of_registration" type="text"
                                           class="inline-block mt-1 form-control"
                                           placeholder="Дата регистрации свидетельства">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                    <input v-model="search_valid_until" type="text"
                                           class="inline-block mt-1 form-control"
                                           placeholder="Действительно до">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                </th>
                            </tr>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                    <input v-model="search_protocol_number" type="text"
                                           class="inline-block mt-1 form-control"
                                           placeholder="Регистрационный номер свидетельства">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                    <input v-model="search_applicant" type="text"
                                           class="inline-block mt-1 form-control"
                                           placeholder="Заявитель">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                    <input v-model="search_manufacturer" type="text"
                                           class="inline-block mt-1 form-control"
                                           placeholder="Изготовитель">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                    <input v-model="search_status" type="text"
                                           class="inline-block mt-1 form-control"
                                           placeholder="Статус свидетельства">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="border: none !important; background-color: white !important;">
                                </th>
                            </tr>
                            <tr>
                                <th class="px-6 py-3 text-start" style="cursor: pointer;"
                                    @click="updateOrdering('id')">
                                    <div class="flex flex-row">
                                        <div class="font-medium text-uppercase"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'id' }">
                                            ID
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="cursor: pointer;"
                                    @click="updateOrdering('protocol_number')">
                                    <div class="flex flex-row">
                                        <div class="font-medium"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'protocol_number' }">
                                            Регистрационный номер
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="cursor: pointer;"
                                    @click="updateOrdering('authorized_body')">
                                    <div class="flex flex-row">
                                        <div class="font-medium"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'authorized_body' }">
                                            Уполномоченный орган
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left" style="cursor: pointer;"
                                    @click="updateOrdering('name_of_material')">
                                    <div class="flex flex-row">
                                        <div class="font-medium"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'name_of_material' }">
                                            Наименование продукции
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="cursor: pointer;"
                                    @click="updateOrdering('manufacturer')">
                                    <div class="flex flex-row">
                                        <div class="leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'manufacturer' }">
                                            Производитель
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="cursor: pointer;"
                                    @click="updateOrdering('applicant')">
                                    <div class="flex flex-row">
                                        <div class="leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'applicant' }">
                                            Заявитель
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left" style="cursor: pointer;"
                                    @click="updateOrdering('date_of_registration')">
                                    <div class="flex flex-row">
                                        <div class="leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                             :class="{ 'font-bold text-blue-600': orderColumn === 'date_of_registration' }">
                                            Срок действия
                                            <i class="bi bi-chevron-expand"></i>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
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
                                    {{ material.date_of_registration + ' - ' + material.valid_until }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <router-link v-if="can('user-edit')"
                                                 :to="{ name: 'register-of-materials.edit', params: { id: material.id } }"
                                                 class="badge bg-primary">Изменить
                                    </router-link>
                                    <a href="#" v-if="can('user-delete')" @click.prevent="deleteMaterial(material.id)"
                                       class="ms-2 badge bg-danger">Удалить</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <Pagination :data="materials" :limit="25" class="mt-4"
                                @pagination-change-page="page => getMaterials(page, search_id, search_name, search_global, orderColumn, orderDirection)"
                    />
                </div>
                <MaterialFileUpload
                    :material-id="currentMaterialId"
                    @upload-success="handleUploadSuccess"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted, watch} from "vue";
import useMaterials from "../../../composables/materials";
import {useAbility} from '@casl/vue';
import moment from 'moment';
import _ from 'lodash';
import MaterialFileUpload from '../../../components/MaterialFileUpload.vue';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

const search_global = ref('');
const search_id = ref('');
const search_name_of_material = ref('');
const search_date_of_registration = ref('');
const search_valid_until = ref('');
const search_protocol_number = ref('');
const search_authorized_body = ref('');
const search_manufacturer = ref('');
const search_applicant = ref('');
const search_status = ref('');

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
        search_id.value,
        search_name_of_material.value,
        search_global.value,
        orderColumn.value,
        orderDirection.value
    );
}

watch(search_global, _.debounce((current, previous) => {
    getMaterials(
        1,
        search_id.value,
        search_name_of_material.value,
        current
    );
}, 200));

watch(search_id, (current, previous) => {
    getMaterials(
        1,
        current,
        search_name_of_material.value,
        search_global.value
    );
});

watch(search_name_of_material, (current, previous) => {
    getMaterials(
        1,
        search_id.value,
        current,
        search_global.value
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

const currentMaterialId = ref(1);
function handleUploadSuccess(files) {
    alert(`Загружено файлов: ${files.length}`);
    // Обновить список файлов и т.д.
}
</script>

<style scoped>
.table {
    font-size: 0.85rem;
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
