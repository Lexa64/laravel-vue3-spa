<template>
    <div class="row justify-content-center my-2">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <h5 class="float-start">{{ $t('roles.roles')}}</h5>
                    <router-link v-if="can('role-list')" :to="{ name: 'roles.create' }" class="btn btn-primary btn-sm float-end">
                        {{ $t('global_buttons.add_new') }}
                    </router-link>
                </div>
                <div class="card-body shadow-sm">
                    <div class="mb-4">
                        <input v-model="search_global" type="text" :placeholder="$t('global_filters.search_global')"
                               class="form-control w-25">
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <input v-model="search_id" type="text"
                                               class="inline-block mt-1 form-control"
                                               :placeholder="$t('roles.filter_by_id')">
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <input v-model="search_title" type="text"
                                               class="inline-block mt-1 form-control"
                                               :placeholder="$t('roles.filter_by_title')">
                                    </th>
                                    <th class="px-6 py-3 text-start"></th>
                                    <th class="px-6 py-3 text-start"></th>
                                    <th class="px-6 py-3 text-start"></th>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 text-start" style="cursor: pointer;"
                                        @click="updateOrdering('id')">
                                        <div class="flex flex-row">
                                            <div class="font-medium text-uppercase"
                                                 :class="{ 'font-bold text-blue-600': orderColumn === 'id' }">
                                                {{ $t('roles.id') }}
                                                <i class="bi bi-chevron-expand"></i>
                                            </div>
                                            <!--<div class="select-none">
                                                <span :class="{
                                                  'text-blue-600': orderDirection === 'asc' && orderColumn === 'id',
                                                  'hidden': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'id',
                                                }">&uarr;</span>
                                                <span :class="{
                                                  'text-blue-600': orderDirection === 'desc' && orderColumn === 'id',
                                                  'hidden': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'id',
                                                }">&darr;</span>
                                            </div>-->
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left" style="cursor: pointer;"
                                        @click="updateOrdering('title')">
                                        <div class="flex flex-row">
                                            <div class="font-medium"
                                                 :class="{ 'font-bold text-blue-600': orderColumn === 'name' }">
                                                {{ $t('roles.title') }}
                                                <i class="bi bi-chevron-expand"></i>
                                            </div>
                                            <!--<div class="select-none">
                                                <span :class="{
                                                      'text-blue-600': orderDirection === 'asc' && orderColumn === 'name',
                                                      'hidden': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'name',
                                                    }">&uarr;</span>
                                                <span :class="{
                                                      'text-blue-600': orderDirection === 'desc' && orderColumn === 'name',
                                                      'hidden': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'name',
                                                    }">&darr;</span>
                                            </div>-->
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left" style="cursor: pointer;"
                                        @click="updateOrdering('created_at')">
                                        <div class="flex flex-row">
                                            <div class="font-medium"
                                                 :class="{ 'font-bold text-blue-600': orderColumn === 'created_at' }">
                                                {{ $t('roles.title') }}
                                                <i class="bi bi-chevron-expand"></i>
                                            </div>
                                            <!--<div class="select-none">
                                                <span :class="{
                                                  'text-blue-600': orderDirection === 'asc' && orderColumn === 'created_at',
                                                  'hidden': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'created_at',
                                                    }">&uarr;</span>
                                                            <span :class="{
                                                  'text-blue-600': orderDirection === 'desc' && orderColumn === 'created_at',
                                                  'hidden': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'created_at',
                                                    }">&darr;</span>
                                            </div>-->
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        {{ $t('global_buttons.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in roles.data" :key="post.id">
                                    <td class="px-6 py-4 text-sm">
                                        {{ post.id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        {{ post.name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        {{ post.created_at }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <router-link v-if="can('role-edit')"
                                                     :to="{ name: 'roles.edit', params: { id: post.id } }"
                                                     class="badge bg-primary">{{ $t('global_buttons.edit') }}
                                        </router-link>
                                        <a href="#" v-if="can('role-delete')" @click.prevent="deleteRole(post.id)"
                                           class="ms-2 badge bg-danger">{{ $t('global_buttons.delete') }}</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <Pagination :data="roles" :limit="3" class="mt-4"
                        @pagination-change-page="page => getRoles(page, search_id, search_title, search_global, orderColumn, orderDirection)"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted, watch} from "vue";
import useRoles from "../../../composables/roles";
import {useAbility} from '@casl/vue';

const search_id = ref('');
const search_title = ref('');
const search_global = ref('');
const orderColumn = ref('created_at');
const orderDirection = ref('desc');
const {roles, getRoles, deleteRole} = useRoles();
const {can} = useAbility();
onMounted(() => {
    getRoles();
})
const updateOrdering = (column) => {
    orderColumn.value = column;
    orderDirection.value = (orderDirection.value === 'asc') ? 'desc' : 'asc';
    getRoles(
        1,
        search_id.value,
        search_title.value,
        search_global.value,
        orderColumn.value,
        orderDirection.value
    );
}

watch(search_id, (current, previous) => {
    getRoles(
        1,
        current,
        search_title.value,
        search_global.value
    );
});

watch(search_title, (current, previous) => {
    getRoles(
        1,
        search_id.value,
        current,
        search_global.value
    );
});

watch(search_global, _.debounce((current, previous) => {
    getRoles(
        1,
        search_id.value,
        search_title.value,
        current
    );
}, 200));

</script>

<style scoped>

</style>
