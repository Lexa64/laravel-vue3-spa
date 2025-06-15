<template>
    <div class="row justify-content-center my-5">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <div class="mb-3">
                            <label for="authorized_body" class="form-label">Уполномоченный орган</label>
                            <select v-model="material.authorized_body" id="authorized_body" class="form-control">
                                <option value='' selected disabled>Выберите уполномоченный орган</option>
                                <option value='РУП "СтройМедиаПроект"'>РУП "СтройМедиаПроект"</option>
                                <option value='РУП "СТРОЙТЕХНОРМ"'>РУП "СТРОЙТЕХНОРМ"</option>
                                <option value='РУП "Институт БелНИИС"'>РУП "Институт БелНИИС"</option>
                                <option value='РУП "БИСП" Управление делами Президента Республики Беларусь"'>РУП "БИСП" Управление делами Президента Республики Беларусь</option>
                                <option value='УП "БелДорНИИ"'>УП "БелДорНИИ"</option>
                                <option value='УП "Институт НИИСМ"'>УП "Институт НИИСМ"</option>
                                <option value='РУП "Сертис" РУП "Белстройцентр"'>РУП "Сертис" РУП "Белстройцентр"</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date_of_registration" class="form-label">Дата регистрации</label>
                            <input v-model="material.date_of_registration" id="date_of_registration" type="date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="valid_until" class="form-label">Действителен до</label>
                            <input v-model="material.valid_until" id="valid_until" type="date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="extended_until" class="form-label">Продлён до</label>
                            <input v-model="material.extended_until" id="extended_until" type="date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="name_of_material" class="form-label">Наименование материала (изделия)</label>
                            <input v-model="material.name_of_material" id="name_of_material" type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="appointment" class="form-label">Назначение</label>
                            <input v-model="material.appointment" id="appointment" type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="manufacturer" class="form-label">Изготовитель</label>
                            <input v-model="material.manufacturer" id="manufacturer" type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="applicant" class="form-label">Заявитель</label>
                            <input v-model="material.applicant" id="applicant" type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="testing_laboratory" class="form-label">Наименование испытательной лаборатории (центра)</label>
                            <select v-model="material.testing_laboratory" id="testing_laboratory" class="form-control">
                                <option value="" selected disabled>Выберите лабораторию</option>
                                <option value="Лаборатория 1">Лаборатория 1</option>
                                <option value="Лаборатория 2">Лаборатория 2</option>
                                <option value="Лаборатория 3">Лаборатория 3</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="protocol_number" class="form-label">Номер протокола</label>
                            <input v-model="material.protocol_number" id="protocol_number" type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="date_expert_opinions" class="form-label">Дата выдачи экспертных заключений</label>
                            <input v-model="material.date_expert_opinions" id="date_expert_opinions" type="date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="certificate_is_valid_for" class="form-label">Техническое свидетельство действует на</label>
                            <select v-model="material.certificate_is_valid_for" id="certificate_is_valid_for" class="form-control">
                                <option value="" selected disabled>Выберите вариант</option>
                                <option value="Опция 1">Опция 1</option>
                                <option value="Опция 2">Опция 2</option>
                                <option value="Опция 3">Опция 3</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="special_marks" class="form-label">Особые отметки</label>
                            <input v-model="material.special_marks" id="special_marks" type="text" class="form-control">
                        </div>

                        <div class="mb-3 form-check">
                            <input v-model="material.is_draft" id="is_draft" type="checkbox" class="form-check-input">
                            <label for="is_draft" class="form-check-label">Это черновик?</label>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">{{ $t('global_buttons.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import useMaterials from "@/composables/materials";
import {onMounted, reactive} from "vue";

export default {
    props: {
        id: {
            required: true,
            type: String,
            default: () => {}
        }
    },

    setup(props) {
        const {errors, material, getMaterial, updateMaterial} = useMaterials();

        onMounted(() => {
            getMaterial(props.id);
            console.log(material)
        });

        const saveMaterial = async () => {
            await updateMaterial(props.id);
        }

        return {
            errors,
            material,
            saveMaterial
        }
    }
}

</script>
