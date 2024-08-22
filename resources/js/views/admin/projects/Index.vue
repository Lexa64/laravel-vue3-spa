<template>
    <div class="">
        <div class="">
            <div class="">
                <router-link :to="{ name: 'projects.create' }" class="btn btn-primary" style="margin-bottom: 10px;">{{ $t('projects.create') }}</router-link>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th class="">
                    <span class="">
                        {{ $t('projects.place') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('projects.number_of_storeys') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('projects.wall_material') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('projects.series') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('projects.year_construction') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('projects.apartment_count') }}
                    </span>
                </th>
                <th class="">
                </th>
            </tr>
            </thead>

            <tbody class="">
            <template v-for="item in projects" :key="item.id">
                <tr class="">
                    <td class="">
                        {{ item.place }}
                    </td>
                    <td class="">
                        {{ item.number_of_storeys }}
                    </td>
                    <td class="">
                        {{ item.wall_material }}
                    </td>
                    <td class="">
                        {{ item.series }}
                    </td>
                    <td class="">
                        {{ item.year_construction }}
                    </td>
                    <td class="">
                        {{ item.apartment_count }}
                    </td>
                    <td class="">
                        <router-link :to="{ name: 'projects.edit', params: { id: item.id } }" class="btn btn-primary" style="margin-right: 10px;">
                            {{ $t('global_buttons.edit') }}
                        </router-link>
                        <button @click="deleteProject(item.id)" class="btn btn-primary">
                            {{ $t('global_buttons.delete') }}
                        </button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import useProjects from "../../../composables/projects";
import {onMounted} from "vue";

export default {
    setup() {
        const {projects, getProjects, destroyProject} = useProjects();

        onMounted(getProjects);

        const deleteProject = async (id) => {
            /*if (!window.confirm('Are you sure?')) {
                return;
            }*/

            await destroyProject(id);
            await getProjects();
        }

        return {
            projects,
            deleteProject
        }
    }
}
</script>
