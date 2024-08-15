import {ref, inject} from 'vue';
import {useRouter} from 'vue-router';
import {useI18n} from 'vue-i18n';

export default function useUsers() {
    const users = ref([]);
    const user = ref({
        name: ''
    });

    const router = useRouter();
    const validationErrors = ref({});
    const isLoading = ref(false);
    const swal = inject('$swal');
    const {t} = useI18n();

    const getUsers = async (
        page = 1,
        search_id = '',
        search_title = '',
        search_global = '',
        order_column = 'created_at',
        order_direction = 'desc'
    ) => {
        axios.get('/api/users?page=' + page +
            '&search_id=' + search_id +
            '&search_title=' + search_title +
            '&search_global=' + search_global +
            '&order_column=' + order_column +
            '&order_direction=' + order_direction)
            .then(response => {
                users.value = response.data;
            });
    }

    const getUser = async (id) => {
        axios.get('/api/users/' + id)
            .then(response => {
                user.value = response.data.data;
            });
    }

    const storeUser = async (user) => {
        if (isLoading.value) {
            return;
        }

        isLoading.value = true;
        validationErrors.value = {};

        let serializedPost = new FormData();
        for (let item in user) {
            if (user.hasOwnProperty(item)) {
                serializedPost.append(item, user[item]);
            }
        }

        axios.post('/api/users', serializedPost)
            .then(response => {
                router.push({name: 'users.index'});
                swal({
                    icon: 'success',
                    title: t('users.save_successfully')
                });
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                }
            })
            .finally(() => isLoading.value = false);
    }

    const updateUser = async (user) => {
        if (isLoading.value) return;

        isLoading.value = true;
        validationErrors.value = {};

        axios.put('/api/users/' + user.id, user)
            .then(response => {
                router.push({name: 'users.index'});
                swal({
                    icon: 'success',
                    title: t('users.update_successfully')
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                }
            })
            .finally(() => isLoading.value = false);
    }

    const deleteUser = async (id) => {
        swal({
            title: t('global_buttons.delete_confirmation'),
            text: t('global_buttons.delete_warning'),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: t('users.delete_confirm_ok'),
            cancelButtonText: t('global_buttons.delete_confirm_cancel'),
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete('/api/users/' + id)
                        .then(response => {
                            getUsers();
                            router.push({name: 'users.index'});
                            swal({
                                icon: 'success',
                                title: t('users.delete_successfully')
                            });
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: t('users.delete_error')
                            })
                        })
                }
            });
    }

    return {
        users,
        user,
        getUsers,
        getUser,
        storeUser,
        updateUser,
        deleteUser,
        validationErrors,
        isLoading
    }
}
