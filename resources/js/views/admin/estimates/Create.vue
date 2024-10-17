<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="">
            <p v-for="error in v" :key="error" class="">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="" @submit.prevent="saveEstimate">
        <div class="container w-75">
            <table class="table table-striped" style="">
                <thead>
                <tr>
                    <th class="">
                        {{ $t('cost_estimate_table.th1') }}
                    </th>
                    <th class="">
                        {{ $t('cost_estimate_table.th2') }}
                    </th>
                    <th class="">
                        {{ $t('cost_estimate_table.th3') }}
                    </th>
                    <th class="">
                        {{ $t('cost_estimate_table.th4') }}
                    </th>
                    <th class="">
                        {{ $t('cost_estimate_table.th5') }}
                    </th>
                </tr>
                </thead>

                <tbody class="">
                <tr class="">
                    <td class="">
                        1
                    </td>
                    <td class="">
                        Срок жизненного цикла здания, лет
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_1_indicator"
                                   id="ce_1_indicator"
                                   class="form-control"
                                   v-model="form.ce_1_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_1_total_costs"
                                   id="ce_1_total_costs"
                                   class="form-control"
                                   v-model="form.ce_1_total_costs">
                        </div>
                    </td>
                    <td class="">
                        лет эксплуатации
                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        2
                    </td>
                    <td class="">
                        Общая площадь жилых помещений здания, м²
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_2_indicator"
                                   id="ce_2_indicator"
                                   class="form-control"
                                   v-model="form.ce_2_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_2_total_costs"
                                   id="ce_2_total_costs"
                                   class="form-control"
                                   v-model="form.ce_2_total_costs">
                        </div>
                    </td>
                    <td class="">
                        исходные данные
                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        3
                    </td>
                    <td class="">
                        Дата, на которую производятся расчёты
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_3_indicator"
                                   id="ce_3_indicator"
                                   class="form-control"
                                   v-model="form.ce_3_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_3_total_costs"
                                   id="ce_3_total_costs"
                                   class="form-control"
                                   v-model="form.ce_3_total_costs">
                        </div>
                    </td>
                    <td class="">

                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        4
                    </td>
                    <td class="">
                        Первоначальная стоимостьвозведения жилого дома
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_4_indicator"
                                   id="ce_4_indicator"
                                   class="form-control"
                                   v-model="form.ce_4_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_4_total_costs"
                                   id="ce_4_total_costs"
                                   class="form-control"
                                   v-model="form.ce_4_total_costs">
                        </div>
                    </td>
                    <td class="">
                        по данным сводного сметного расчёта стоимости строительства
                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        5
                    </td>
                    <td class="">
                        Расходы на оплату коммунальных платежей в год
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_5_indicator"
                                   id="ce_5_indicator"
                                   class="form-control"
                                   v-model="form.ce_5_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_5_total_costs"
                                   id="ce_5_total_costs"
                                   class="form-control"
                                   v-model="form.ce_5_total_costs">
                        </div>
                    </td>
                    <td class="">

                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        6
                    </td>
                    <td class="">
                        Сумма коммунальных платежей в течение всего жизненного цикла
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_6_indicator"
                                   id="ce_6_indicator"
                                   class="form-control"
                                   v-model="form.ce_6_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_6_total_costs"
                                   id="ce_6_total_costs"
                                   class="form-control"
                                   v-model="form.ce_6_total_costs">
                        </div>
                    </td>
                    <td class="">
                        на 50 лет в текущих ценах
                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        7
                    </td>
                    <td class="">
                        Расходы на текущий ремонт
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_7_indicator"
                                   id="ce_7_indicator"
                                   class="form-control"
                                   v-model="form.ce_7_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_7_total_costs"
                                   id="ce_7_total_costs"
                                   class="form-control"
                                   v-model="form.ce_7_total_costs">
                        </div>
                    </td>
                    <td class="">
                        из расчёта стоимости ремонта на 1 м² один раз в 7-8 лет
                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        8
                    </td>
                    <td class="">
                        Расходы на текущий ремонт в течение всего жизненного цикла
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_8_indicator"
                                   id="ce_8_indicator"
                                   class="form-control"
                                   v-model="form.ce_8_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_8_total_costs"
                                   id="ce_8_total_costs"
                                   class="form-control"
                                   v-model="form.ce_8_total_costs">
                        </div>
                    </td>
                    <td class="">

                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        9
                    </td>
                    <td class="">
                        Расходы на капитальный ремонт и модернизацию
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_9_indicator"
                                   id="ce_9_indicator"
                                   class="form-control"
                                   v-model="form.ce_9_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_9_total_costs"
                                   id="ce_9_total_costs"
                                   class="form-control"
                                   v-model="form.ce_9_total_costs">
                        </div>
                    </td>
                    <td class="">
                        расчёт на 1 м² один раз в 30 лет
                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        10
                    </td>
                    <td class="">
                        Расходы на капитальный ремонт и модернизацию в течение всего жизненного цикла
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_10_indicator"
                                   id="ce_10_indicator"
                                   class="form-control"
                                   v-model="form.ce_10_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_10_total_costs"
                                   id="ce_10_total_costs"
                                   class="form-control"
                                   v-model="form.ce_10_total_costs">
                        </div>
                    </td>
                    <td class="">

                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        11
                    </td>
                    <td class="">
                        Расходы на снос здания
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_11_indicator"
                                   id="ce_11_indicator"
                                   class="form-control"
                                   v-model="form.ce_11_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_11_total_costs"
                                   id="ce_11_total_costs"
                                   class="form-control"
                                   v-model="form.ce_11_total_costs">
                        </div>
                    </td>
                    <td class="">
                        30% от стоимости строительства без учета стоимости материалов, изделий, конструкций и оборудования с учетом транспортных расходов на их доставку
                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        12
                    </td>
                    <td class="">
                        Расходы на снос здания
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_12_indicator"
                                   id="ce_12_indicator"
                                   class="form-control"
                                   v-model="form.ce_12_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_12_total_costs"
                                   id="ce_12_total_costs"
                                   class="form-control"
                                   v-model="form.ce_12_total_costs">
                        </div>
                    </td>
                    <td class="">

                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        13
                    </td>
                    <td class="">
                        Итого стоимость жизненного цикла жилого дома
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_13_indicator"
                                   id="ce_13_indicator"
                                   class="form-control"
                                   v-model="form.ce_13_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_13_total_costs"
                                   id="ce_13_total_costs"
                                   class="form-control"
                                   v-model="form.ce_13_total_costs">
                        </div>
                    </td>
                    <td class="">
                        на общую площадь жилых помещений здания
                    </td>
                </tr>

                <tr class="">
                    <td class="">
                        14
                    </td>
                    <td class="">
                        Приведённая стоимость жизненного цикла здания
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_14_indicator"
                                   id="ce_14_indicator"
                                   class="form-control"
                                   v-model="form.ce_14_indicator">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ce_14_total_costs"
                                   id="ce_14_total_costs"
                                   class="form-control"
                                   v-model="form.ce_14_total_costs">
                        </div>
                    </td>
                    <td class="">
                        на 1 м² общей площади жилых помещений здания в год
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
import useEstimates from "../../../composables/estimates";

export default {
    setup() {
        const form = reactive({
            'ce_1_indicator': '',
            'ce_1_total_costs': '',
            'ce_2_indicator': '',
            'ce_2_total_costs': '',
            'ce_3_indicator': '',
            'ce_3_total_costs': '',
            'ce_4_indicator': '',
            'ce_4_total_costs': '',
            'ce_5_indicator': '',
            'ce_5_total_costs': '',
            'ce_6_indicator': '',
            'ce_6_total_costs': '',
            'ce_7_indicator': '',
            'ce_7_total_costs': '',
            'ce_8_indicator': '',
            'ce_8_total_costs': '',
            'ce_9_indicator': '',
            'ce_9_total_costs': '',
            'ce_10_indicator': '',
            'ce_10_total_costs': '',
            'ce_11_indicator': '',
            'ce_11_total_costs': '',
            'ce_12_indicator': '',
            'ce_12_total_costs': '',
            'ce_13indicator': '',
            'ce_13_total_costs': '',
            'ce_14_indicator': '',
            'ce_14_total_costs': '',
        });

        const {errors, storeEstimate} = useEstimates();

        const saveEstimate = async () => {
            await storeEstimate({...form});
        }

        return {
            form,
            errors,
            saveEstimate
        }
    }
}
</script>
