import {inject, ref} from 'vue';
import axios from 'axios';
import {useRouter} from "vue-router";
import {useI18n} from "vue-i18n";

export default function useMaterials() {
    const materials = ref({});
    const material = ref({
        protocol_number: ''
    });

    const router = useRouter();
    const validationErrors = ref({});
    const isLoading = ref(false);
    const swal = inject('$swal');
    const {t} = useI18n();

    const getMaterials = async (
        page = 1,
        search_id = '',
        search_title = '',
        search_global = '',
        order_column = 'created_at',
        order_direction = 'desc'
    ) => {
        axios.get('/api/register-of-materials?page=' + page +
            '&search_id=' + search_id +
            '&search_title=' + search_title +
            '&search_global=' + search_global +
            '&order_column=' + order_column +
            '&order_direction=' + order_direction)
            .then(response => {
                materials.value = response.data;
            });
    };

    const getMaterial = async (id) => {
        axios.get('/api/register-of-materials/' + id)
            .then(response => {
                material.value = response.data.data;
            });
    }

    const storeMaterial = async (material) => {
        if (isLoading.value) {
            return;
        }

        isLoading.value = true;
        validationErrors.value = {};

        let serializedMaterial = new FormData();
        for (let item in material) {
            if (material.hasOwnProperty(item)) {
                serializedMaterial.append(item, material[item]);
            }
        }

        axios.post('/api/register-of-materials', serializedMaterial)
            .then(response => {
                router.push({name: 'register-of-materials.index'});
                swal({
                    icon: 'success',
                    title: 'Сохранено успешно'
                });
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                }
            })
            .finally(() => isLoading.value = false);
    }

    const updateMaterial = async (material) => {
        if (isLoading.value) return;

        isLoading.value = true;
        validationErrors.value = {};

        axios.put('/api/register-of-materials/' + material.id, material)
            .then(response => {
                router.push({name: 'register-of-materials.index'});
                swal({
                    icon: 'success',
                    title: 'Запись успешно обновлена'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                }
            })
            .finally(() => isLoading.value = false);
    }

    const deleteMaterial = async (id) => {
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
                    axios.delete('/api/register-of-materials/' + id)
                        .then(response => {
                            getMaterials();
                            router.push({name: 'register-of-materials.index'});
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
                        });
                }
            });
    }

    return {
        materials,
        material,
        getMaterials,
        getMaterial,
        storeMaterial,
        updateMaterial,
        deleteMaterial,
        validationErrors,
        isLoading
    };
}
