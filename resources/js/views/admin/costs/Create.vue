<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="">
            <p v-for="error in v" :key="error" class="">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="" @submit.prevent="saveCost">
        <div class="container w-50">
            <table class="table table-striped" style="">
                <thead>
                <tr>
                    <th class="">
                        {{ $t('utility_costs_table.th1') }}
                    </th>
                    <th class="">
                        {{ $t('utility_costs_table.th2') }}
                    </th>
                    <th class="">
                        {{ $t('utility_costs_table.th3') }}
                    </th>
                    <th class="">
                        {{ $t('utility_costs_table.th4') }}
                    </th>
                </tr>
                </thead>

                <tbody class="">
                <tr class="">
                    <td class="">
                        1
                    </td>
                    <td class="">
                        Электроэнергия (всего), в т.ч.
                    </td>
                    <td class="">
                        кВт*ч
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_1"
                                   id="uc_1"
                                   class="form-control"
                                   v-model="form.uc_1">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        1.1
                    </td>
                    <td class="">
                        Электроэнергия, потребляемая на освещение вспомогательных помещений, на работу оборудования, за исключением лифтов
                    </td>
                    <td class="">
                        кВт*ч
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_1_1"
                                   id="uc_1_1"
                                   class="form-control"
                                   v-model="form.uc_1_1">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        1.2
                    </td>
                    <td class="">
                        Электроэнергия, потребляемая на работу лифта
                    </td>
                    <td class="">
                        кВт*ч
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_1_2"
                                   id="uc_1_2"
                                   class="form-control"
                                   v-model="form.uc_1_2">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        1.3
                    </td>
                    <td class="">
                        Электроэнергия, потребляемая домохозяйствами
                    </td>
                    <td class="">
                        кВт*ч
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_1_3"
                                   id="uc_1_3"
                                   class="form-control"
                                   v-model="form.uc_1_3">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        2
                    </td>
                    <td class="">
                        Газ
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_2"
                                   id="uc_2"
                                   class="form-control"
                                   v-model="form.uc_2">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        3
                    </td>
                    <td class="">
                        Тепловая энергия (всего), в т.ч.
                    </td>
                    <td class="">
                        Гкал
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_3"
                                   id="uc_3"
                                   class="form-control"
                                   v-model="form.uc_3">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        3.1
                    </td>
                    <td class="">
                        Теплоснабжение (отопление)
                    </td>
                    <td class="">
                        Гкал
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_3_1"
                                   id="uc_3_1"
                                   class="form-control"
                                   v-model="form.uc_3_1">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        3.2
                    </td>
                    <td class="">
                        Горячее водоснабжение
                    </td>
                    <td class="">
                        Гкал
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_3_2"
                                   id="uc_3_2"
                                   class="form-control"
                                   v-model="form.uc_3_2">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        4
                    </td>
                    <td class="">
                        Вода (всего), в т.ч.
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_4"
                                   id="uc_4"
                                   class="form-control"
                                   v-model="form.uc_4">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        4.1
                    </td>
                    <td class="">
                        Холодная вода
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_4_1"
                                   id="uc_4_1"
                                   class="form-control"
                                   v-model="form.uc_4_1">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        4.2
                    </td>
                    <td class="">
                        Горячая вода
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_4_2"
                                   id="uc_4_2"
                                   class="form-control"
                                   v-model="form.uc_4_2">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        5
                    </td>
                    <td class="">
                        Водоотведение (канализация)
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_5"
                                   id="uc_5"
                                   class="form-control"
                                   v-model="form.uc_5">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        7
                    </td>
                    <td class="">
                        Обращение с твердыми коммунальными отходами (из расчета 2,68м3 отходов на 1 человека в год)
                    </td>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                <tr class="">
                    <td class="">
                        7.1
                    </td>
                    <td class="">
                        в жилых домах, оборудованных функционирующим мусоропроводом
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_7_1"
                                   id="uc_7_1"
                                   class="form-control"
                                   v-model="form.uc_7_1">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        7.2
                    </td>
                    <td class="">
                        в жилых домах, не оборудованных мусоропроводом, или оборудованных нефункционирующим мусоропроводом
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_7_2"
                                   id="uc_7_2"
                                   class="form-control"
                                   v-model="form.uc_7_2">
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>

            <button type="submit" class="form-control btn btn-primary mt-3">{{ $t('global_buttons.create') }}</button>
        </div>
    </form>
</template>

<script>
import {reactive} from "vue";
import useCosts from "../../../composables/costs";

export default {
    setup() {
        const form = reactive({
            'uc_1': '',
            'uc_1_1': '',
            'uc_1_2': '',
            'uc_1_3': '',
            'uc_2': '',
            'uc_3': '',
            'uc_3_1': '',
            'uc_3_2': '',
            'uc_4': '',
            'uc_4_1': '',
            'uc_4_2': '',
            'uc_5': '',
        });

        const {errors, storeCost} = useCosts();

        const saveCost = async () => {
            await storeCost({...form});
        }

        return {
            form,
            errors,
            saveCost
        }
    }
}
</script>
