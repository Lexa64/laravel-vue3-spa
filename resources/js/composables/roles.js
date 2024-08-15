import {ref, inject} from 'vue';
import {useRouter} from 'vue-router';
import {useI18n} from 'vue-i18n';

export default function useRoles() {
    const roles = ref([]);
    const role = ref({
        name: ''
    });
    const roleList = ref([]);
    const rolePermissionList = ref([]);
    const router = useRouter();
    const validationErrors = ref({});
    const isLoading = ref(false);
    const swal = inject('$swal');
    const {t} = useI18n();

    const getRoles = async (
        page = 1,
        search_id = '',
        search_title = '',
        search_global = '',
        order_column = 'created_at',
        order_direction = 'desc'
    ) => {
        axios.get('/api/roles?page=' + page +
            '&search_id=' + search_id +
            '&search_title=' + search_title +
            '&search_global=' + search_global +
            '&order_column=' + order_column +
            '&order_direction=' + order_direction)
            .then(response => {
                roles.value = response.data;
            });
    }

    const getRole = async (id) => {
        axios.get('/api/roles/' + id)
            .then(response => {
                role.value = response.data.data;
            });
    }
    const getRolePermissions = async (id) => {
        axios.get('/api/role-permissions/' + id)
            .then(response => {
                rolePermissionList.value = response.data.data;
            });
    }
    const storeRole = async (role) => {
        if (isLoading.value) {
            return;
        }

        isLoading.value = true;
        validationErrors.value = {};

        axios.post('/api/roles', role)
            .then(response => {
                router.push({name: 'roles.index'});
                swal({
                    icon: 'success',
                    title: t('roles.save_successfully')
                });
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                }
            })
            .finally(() => isLoading.value = false);
    }

    const updateRole = async (role) => {
        if (isLoading.value) {
            return;
        }

        isLoading.value = true;
        validationErrors.value = {};

        axios.put('/api/roles/' + role.id, role)
            .then(response => {
                router.push({name: 'roles.index'});
                swal({
                    icon: 'success',
                    title: t('roles.update_successfully')
                });
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                }
            })
            .finally(() => isLoading.value = false);
    }

    const updateRolePermissions = async (role, permissions) => {
        if (isLoading.value) {
            return;
        }

        isLoading.value = true;
        validationErrors.value = {};

        axios.put('/api/role-permissions', {permissions: JSON.stringify(permissions), role_id: role.id})
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                }
            })
            .finally(() => {
                isLoading.value = false;
                updateRole(role);
            });
    }

    const deleteRole = async (id) => {
        swal({
            title: t('global_buttons.delete_confirmation'),
            text: t('global_buttons.delete_warning'),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: t('global_buttons.delete'),
            cancelButtonText: t('global_buttons.delete_confirm_cancel'),
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete('/api/roles/' + id)
                        .then(response => {
                            getRoles()
                            router.push({name: 'roles.index'});
                            swal({
                                icon: 'success',
                                title: t('roles.delete_successfully')
                            });
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: t('roles.delete_error')
                            });
                        });
                }
            });
    }

    const getRoleList = async () => {
        axios.get('/api/role-list')
            .then(response => {
                roleList.value = response.data.data;
            });
    }

    return {
        roles,
        role,
        roleList,
        getRoleList,
        getRoles,
        rolePermissionList,
        getRolePermissions,
        getRole,
        storeRole,
        updateRole,
        updateRolePermissions,
        deleteRole,
        validationErrors,
        isLoading
    }
}
