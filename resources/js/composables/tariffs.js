import {inject, ref} from 'vue';
import axios from "axios";
import {useRouter} from 'vue-router';
import {useI18n} from 'vue-i18n';

export default function useTariffs() {
    const tariffs = ref([]);
    const tariff = ref([]);
    const router = useRouter();
    const errors = ref('');

    const swal = inject('$swal');
    const {t} = useI18n();

    const getTariffs = async () => {
        let response = await axios.get('/api/utility_tariffs');
        tariffs.value = response.data.data;
    }

    const getTariff = async (id) => {
        let response = await axios.get('/api/utility_tariffs/' + id);
        tariff.value = response.data.data;
    }

    const storeTariff = async (data) => {
        errors.value = '';
        try {
            await axios.post('/api/utility_tariffs', data);
            await router.push({name: 'tariffs.index'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    }

    const updateTariff = async (id) => {
        errors.value = '';
        try {
            await axios.put('/api/utility_tariffs/' + id, tariff.value);
            await router.push({name: 'tariffs.index'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    }

    const destroyTariff = async (id) => {
        swal({
            title: t('global_buttons.delete_confirmation'),
            text: t('global_buttons.delete_warning'),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: t('projects.delete_confirm_ok'),
            cancelButtonText: t('global_buttons.delete_confirm_cancel'),
            confirmButtonColor: '#ef4444',
            cancelButtonColor: "lightgrey",
            timer: 20000,
            timerProgressBar: true,
        }).then(result => {
            if (result.isConfirmed) {
                axios.delete('/api/utility_tariffs/' + id)
                    .then(response => {
                        getTariffs();
                        router.push({name: 'tariffs.index'});
                        swal({
                            icon: 'success',
                            title: t('utility_tariffs.delete_successfully')
                        });
                    })
                    .catch(error => {
                        swal({
                            icon: 'error',
                            title: t('projects.delete_error')
                        });
                    });
            }
        });
    }

    return {
        tariffs,
        tariff,
        errors,
        getTariffs,
        getTariff,
        storeTariff,
        updateTariff,
        destroyTariff
    }
}
