import { ref } from 'vue';
import axios from 'axios';

export default function useMaterials() {
    const materials = ref({});
    const errors = ref({});

    /*const getMaterials = async (
        page = 1,
        id = '',
        name = '',
        global = '',
        orderColumn = 'date_of_registration',
        orderDirection = 'desc'
    ) => {
        try {
            const response = await axios.get('/api/register-of-materials', {
                headers: {
                    'Accept': 'application/json'
                },
                params: {
                    page,
                    id,
                    name,
                    global,
                    orderColumn,
                    orderDirection
                }
            });
            materials.value = response.data;
        } catch (error) {
            console.error(error);
        }
    };*/

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

    const deleteMaterial = async (id) => {
        if (!confirm('Are you sure you want to delete this material?')) {
            return;
        }
        try {
            await axios.delete(`/api/register-of-materials/${id}`);
            await getMaterials();
        } catch (error) {
            console.error(error);
        }
    };

    return {
        materials,
        errors,
        getMaterials,
        deleteMaterial
    };
}
