import {inject, ref} from 'vue';
import axios from "axios";
import {useRouter} from 'vue-router';
import {useI18n} from 'vue-i18n';

export default function useProjects() {
    const projects = ref([]);
    const project = ref([]);
    const router = useRouter();
    const errors = ref('');

    const swal = inject('$swal');
    const {t} = useI18n();

    const getProjects = async () => {
        let response = await axios.get('/api/projects');
        projects.value = response.data.data;
    }

    const getProject = async (id) => {
        let response = await axios.get('/api/projects/' + id);
        project.value = response.data.data;
    }

    const storeProject = async (data) => {
        errors.value = '';
        try {
            await axios.post('/api/projects', data);
            await router.push({name: 'projects.index'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    }

    const updateProject = async (id) => {
        errors.value = '';
        try {
            await axios.put('/api/projects/' + id, project.value);
            await router.push({name: 'projects.index'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    }

    const destroyProject = async (id) => {
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
                axios.delete('/api/projects/' + id)
                    .then(response => {
                        getProjects();
                        router.push({name: 'projects.index'});
                        swal({
                            icon: 'success',
                            title: t('projects.delete_successfully')
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

        //await axios.delete('/api/projects/' + id);
    }

    return {
        projects,
        project,
        errors,
        getProjects,
        getProject,
        storeProject,
        updateProject,
        destroyProject
    }
}
