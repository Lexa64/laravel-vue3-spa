<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="">
            <p v-for="error in v" :key="error" class="">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="" @submit.prevent="saveProject">
        <div class="container w-25">
            <div>
                <label for="name" class="">{{ $t('life_cycle.place') }}</label>
                <div class="mt-1">
                    <input type="text" name="place" id="place"
                           class="form-control"
                           v-model="form.place">
                </div>
            </div>
            <div>
                <label for="email" class="">{{ $t('life_cycle.number_of_storeys') }}</label>
                <div class="mt-1">
                    <input type="text" name="number_of_storeys" id="number_of_storeys"
                           class="form-control"
                           v-model="form.number_of_storeys">
                </div>
            </div>
            <div>
                <label for="address" class="">{{ $t('life_cycle.wall_material') }}</label>
                <div class="mt-1">
                    <input type="text" name="wall_material" id="wall_material"
                           class="form-control"
                           v-model="form.wall_material">
                </div>
            </div>
            <div>
                <label for="website" class="">{{ $t('life_cycle.series') }}</label>
                <div class="mt-1">
                    <input type="text" name="series" id="series"
                           class="form-control"
                           v-model="form.series">
                </div>
            </div>
            <div>
                <label for="name" class="">{{ $t('life_cycle.year_construction') }}</label>
                <div class="mt-1">
                    <input type="text" name="year_construction" id="year_construction"
                           class="form-control"
                           v-model="form.year_construction">
                </div>
            </div>
            <div>
                <label for="name" class="">{{ $t('life_cycle.year_renovation') }}</label>
                <div class="mt-1">
                    <input type="text" name="year_renovation" id="year_renovation"
                           class="form-control"
                           v-model="form.year_renovation">
                </div>
            </div>
            <div>
                <label for="name" class="">{{ $t('life_cycle.square_living') }}</label>
                <div class="mt-1">
                    <input type="text" name="square_living" id="square_living"
                           class="form-control"
                           v-model="form.square_living">
                </div>
            </div>
            <div>
                <label for="name" class="">{{ $t('life_cycle.square_auxiliary') }}</label>
                <div class="mt-1">
                    <input type="text" name="square_auxiliary" id="square_auxiliary"
                           class="form-control"
                           v-model="form.square_auxiliary">
                </div>
            </div>
            <div>
                <label for="name" class="">{{ $t('life_cycle.apartment_count') }}</label>
                <div class="mt-1">
                    <input type="text" name="apartment_count" id="apartment_count"
                           class="form-control"
                           v-model="form.apartment_count">
                </div>
            </div>
            <div>
                <label for="name" class="">{{ $t('life_cycle.residents_count') }}</label>
                <div class="mt-1">
                    <input type="text" name="residents_count" id="residents_count"
                           class="form-control"
                           v-model="form.residents_count">
                </div>
            </div>

            <button type="submit" class="form-control btn btn-primary mt-3">{{ $t('global_buttons.create') }}</button>
        </div>
    </form>
</template>

<script>
import {reactive} from "vue";
import useProjects from "../../../composables/projects";

export default {
    setup() {
        const form = reactive({
            'place': '',
            'number_of_storeys': '',
            'wall_material': '',
            'series': '',
            'year_construction': '',
            'year_renovation': '',
            'square_living': '',
            'square_auxiliary': '',
            'apartment_count': '',
            'residents_count': '',
        });

        const {errors, storeProject} = useProjects();

        const saveProject = async () => {
            await storeProject({...form});
        }

        return {
            form,
            errors,
            saveProject
        }
    }
}
</script>
