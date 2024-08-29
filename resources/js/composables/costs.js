import {inject, ref} from 'vue';
import axios from "axios";
import {useRouter} from 'vue-router';
import {useI18n} from 'vue-i18n';

export default function useCosts() {
    const costs = ref([]);
    const cost = ref([]);
    const router = useRouter();
    const errors = ref('');

    const swal = inject('$swal');
    const {t} = useI18n();

    const getCosts = async () => {
        let response = await axios.get('/api/utility_costs');
        costs.value = response.data.data;
    }

    const getCost = async (id) => {
        let response = await axios.get('/api/utility_costs/' + id);
        cost.value = response.data.data;
    }

    const storeCost = async (data) => {
        errors.value = '';
        try {
            await axios.post('/api/utility_costs', data);
            await router.push({name: 'costs.index'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    }

    const updateCost = async (id) => {
        errors.value = '';
        try {
            await axios.put('/api/utility_costs/' + id, cost.value);
            await router.push({name: 'costs.index'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    }

    const destroyCost = async (id) => {
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
                axios.delete('/api/utility_costs/' + id)
                    .then(response => {
                        getCosts();
                        router.push({name: 'costs.index'});
                        swal({
                            icon: 'success',
                            title: t('utility_costs.delete_successfully')
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
        costs,
        cost,
        errors,
        getCosts,
        getCost,
        storeCost,
        updateCost,
        destroyCost
    }
}
