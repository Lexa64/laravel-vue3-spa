<template>
    <div class="row justify-content-center my-2">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <h5 class="float-start">{{ $t('users.users')}}</h5>
                    <router-link v-if="can('user-list')" :to="{ name: 'users.create' }" class="btn btn-primary btn-sm float-end">
                        {{ $t('users.add_new') }}
                    </router-link>
                </div>
                <div class="card-body shadow-sm">
                    <div class="mb-4">
                        <input v-model="search_global" type="text" :placeholder="$t('users.search_global')"
                               class="form-control w-25">
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <input v-model="search_id" type="text"
                                               class="inline-block mt-1 form-control"
                                               :placeholder="$t('users.filter_by_id')">
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <input v-model="search_title" type="text"
                                               class="inline-block mt-1 form-control"
                                               :placeholder="$t('users.filter_by_name')">
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
                                                {{ $t('users.id') }}
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
                                                 :class="{ 'font-bold text-blue-600': orderColumn === 'title' }">
                                                {{ $t('users.name') }}
                                                <i class="bi bi-chevron-expand"></i>
                                            </div>
                                            <!--<div class="select-none">
                                                <span :class="{
                                                    'text-blue-600': orderDirection === 'asc' && orderColumn === 'title',
                                                    'hidden': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'title',
                                                }">&uarr;</span>
                                                <span :class="{
                                                    'text-blue-600': orderDirection === 'desc' && orderColumn === 'title',
                                                    'hidden': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'title',
                                                }">&darr;</span>
                                            </div>-->
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left" style="cursor: pointer;"
                                        @click="updateOrdering('email')">
                                        <div class="flex flex-row">
                                            <div class="font-medium"
                                                 :class="{ 'font-bold text-blue-600': orderColumn === 'email' }">
                                                {{ $t('users.email') }}
                                                <i class="bi bi-chevron-expand"></i>
                                            </div>
                                            <!--<div class="select-none">
                                                <span :class="{
                                                  'text-blue-600': orderDirection === 'asc' && orderColumn === 'email',
                                                  'hidden': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'email',
                                                }">&uarr;</span>
                                                <span :class="{
                                                  'text-blue-600': orderDirection === 'desc' && orderColumn === 'email',
                                                  'hidden': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'email',
                                                }">&darr;</span>
                                            </div>-->
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left" style="cursor: pointer;"
                                        @click="updateOrdering('created_at')">
                                        <div class="flex flex-row">
                                            <div class="leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                                 :class="{ 'font-bold text-blue-600': orderColumn === 'created_at' }">
                                                {{ $t('users.created_at') }}
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
                                        {{ $t('users.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in users.data" :key="post.id">
                                    <td class="px-6 py-4 text-sm">
                                        {{ post.id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        {{ post.name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        {{ post.email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        {{ moment(post.created_at).format('YYYY-MM-DD HH:mm:ss') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <router-link v-if="can('user-edit')"
                                                     :to="{ name: 'users.edit', params: { id: post.id } }"
                                                     class="badge bg-primary">{{ $t('users.edit') }}
                                        </router-link>
                                        <a href="#" v-if="can('user-delete')" @click.prevent="deleteUser(post.id)"
                                           class="ms-2 badge bg-danger">{{ $t('users.delete') }}</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <Pagination :data="users" :limit="3" class="mt-4"
                                @pagination-change-page="page => getUsers(page, search_id, search_title, search_global, orderColumn, orderDirection)"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted, watch} from "vue";
import useUsers from "../../../composables/users";
import {useAbility} from '@casl/vue';
import moment from 'moment';

const search_id = ref('');
const search_title = ref('');
const search_global = ref('');
const orderColumn = ref('created_at');
const orderDirection = ref('desc');
const {users, getUsers, deleteUser} = useUsers();
const {can} = useAbility();

onMounted(() => {
    getUsers();
});

const updateOrdering = (column) => {
    orderColumn.value = column;
    orderDirection.value = (orderDirection.value === 'asc') ? 'desc' : 'asc';
    getUsers(
        1,
        search_id.value,
        search_title.value,
        search_global.value,
        orderColumn.value,
        orderDirection.value
    );
}

watch(search_id, (current, previous) => {
    getUsers(
        1,
        current,
        search_title.value,
        search_global.value
    );
});

watch(search_title, (current, previous) => {
    getUsers(
        1,
        search_id.value,
        current,
        search_global.value
    );
});

watch(search_global, _.debounce((current, previous) => {
    getUsers(
        1,
        search_id.value,
        search_title.value,
        current
    );
}, 200));
</script>
