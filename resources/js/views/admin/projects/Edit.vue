<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="">
            <p v-for="error in v" :key="error" class="">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="" v-on:submit.prevent="saveProject">
        <div class="container w-25">
            <div>
                <label for="name" class="">{{ $t('projects.place') }}</label>
                <div class="mt-1">
                    <input type="text" name="place" id="place"
                           class="form-control"
                           v-model="project.place">
                </div>
            </div>
            <div>
                <label for="email" class="">{{ $t('projects.number_of_storeys') }}</label>
                <div class="mt-1">
                    <input type="text" name="number_of_storeys" id="number_of_storeys"
                           class="form-control"
                           v-model="project.number_of_storeys">
                </div>
            </div>
            <div>
                <label for="address" class="">{{ $t('projects.wall_material') }}</label>
                <div class="mt-1">
                    <input type="text" name="wall_material" id="wall_material"
                           class="form-control"
                           v-model="project.wall_material">
                </div>
            </div>
            <div>
                <label for="website" class="">{{ $t('projects.series') }}</label>
                <div class="mt-1">
                    <input type="text" name="series" id="series"
                           class="form-control"
                           v-model="project.series">
                </div>
            </div>
            <div>
                <label for="website" class="">{{ $t('projects.year_construction') }}</label>
                <div class="mt-1">
                    <input type="text" name="year_construction" id="year_construction"
                           class="form-control"
                           v-model="project.year_construction">
                </div>
            </div>
            <div>
                <label for="website" class="">{{ $t('projects.year_renovation') }}</label>
                <div class="mt-1">
                    <input type="text" name="year_renovation" id="year_renovation"
                           class="form-control"
                           v-model="project.year_renovation">
                </div>
            </div>
            <div>
                <label for="website" class="">{{ $t('projects.square_living') }}</label>
                <div class="mt-1">
                    <input type="text" name="square_living" id="square_living"
                           class="form-control"
                           v-model="project.square_living">
                </div>
            </div>
            <div>
                <label for="website" class="">{{ $t('projects.square_auxiliary') }}</label>
                <div class="mt-1">
                    <input type="text" name="square_auxiliary" id="square_auxiliary"
                           class="form-control"
                           v-model="project.square_auxiliary">
                </div>
            </div>
            <div>
                <label for="website" class="">{{ $t('projects.apartment_count') }}</label>
                <div class="mt-1">
                    <input type="text" name="apartment_count" id="apartment_count"
                           class="form-control"
                           v-model="project.apartment_count">
                </div>
            </div>
            <div>
                <label for="website" class="">{{ $t('projects.residents_count') }}</label>
                <div class="mt-1">
                    <input type="text" name="residents_count" id="residents_count"
                           class="form-control"
                           v-model="project.residents_count">
                </div>
            </div>

            <button type="submit" class="form-control btn btn-primary mt-3">{{ $t('global_buttons.save') }}</button>
        </div>
    </form>
</template>

<script>
import useProjects from "../../../composables/projects";
import {onMounted} from "vue";

export default {
    props: {
        id: {
            required: true,
            type: String,
            default: () => {}
        }
    },

    setup(props) {
        const {errors, project, getProject, updateProject} = useProjects();

        //onMounted(getProject(props.id));
        onMounted(() => {
            getProject(props.id);
        });

        const saveProject = async () => {
            await updateProject(props.id);
        }

        return {
            errors,
            project,
            saveProject
        }
    }
}
</script>
