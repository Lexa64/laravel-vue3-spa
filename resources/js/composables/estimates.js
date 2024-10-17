import {inject, ref} from 'vue';
import axios from "axios";
import {useRouter} from 'vue-router';
import {useI18n} from 'vue-i18n';

export default function useEstimates() {
    const estimates = ref([]);
    const estimate = ref([]);
    const router = useRouter();
    const errors = ref('');

    const swal = inject('$swal');
    const {t} = useI18n();

    const getEstimates = async () => {
        let response = await axios.get('/api/cost_estimates');
        estimates.value = response.data.data;
    }

    const getEstimate = async (id) => {
        let response = await axios.get('/api/cost_estimates/' + id);
        estimate.value = response.data.data;
    }

    const storeEstimate = async (data) => {
        errors.value = '';
        try {
            await axios.post('/api/cost_estimates', data);
            await router.push({name: 'estimates.index'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    }

    const updateEstimate = async (id) => {
        errors.value = '';
        try {
            await axios.put('/api/cost_estimates/' + id, estimate.value);
            await router.push({name: 'estimates.index'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    }

    const destroyEstimate = async (id) => {
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
                axios.delete('/api/cost_estimates/' + id)
                    .then(response => {
                        getEstimates();
                        router.push({name: 'estimates.index'});
                        swal({
                            icon: 'success',
                            title: t('cost_estimates.delete_successfully')
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
        estimates,
        estimate,
        errors,
        getEstimates,
        getEstimate,
        storeEstimate,
        updateEstimate,
        destroyEstimate
    }
}
