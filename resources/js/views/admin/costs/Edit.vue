<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="">
            <p v-for="error in v" :key="error" class="">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="" v-on:submit.prevent="saveCost">
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
                        Электроэнергия всего, в т.ч.
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
                                   v-model="cost.uc_1">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        1.1
                    </td>
                    <td class="">
                        Электроэнергия, потребляемая на освещение вспомогательных помещений, на работу оборудования, за исключением лифта
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
                                   v-model="cost.uc_1_1">
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
                                   v-model="cost.uc_1_2">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        1.3
                    </td>
                    <td class="">
                        Электроэнергия, потребляемая домохозяйствами, 200 кВТ*ч  на квартиру
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
                                   v-model="cost.uc_1_3">
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
                                   v-model="cost.uc_2">
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
                                   v-model="cost.uc_3">
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
                                   v-model="cost.uc_3_1">
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
                                   v-model="cost.uc_3_2">
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
                                   v-model="cost.uc_4">
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
                                   v-model="cost.uc_4_1">
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
                                   v-model="cost.uc_4_2">
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
                                   v-model="cost.uc_5">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        6
                    </td>
                    <td class="">
                        Техническое обслуживание (всего), в т.ч.
                    </td>
                    <td class="">
                        руб.
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_6"
                                   id="uc_6"
                                   class="form-control"
                                   v-model="cost.uc_6">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        6.1
                    </td>
                    <td class="">
                        жилого дома
                    </td>
                    <td class="">
                        руб.
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_6_1"
                                   id="uc_6_1"
                                   class="form-control"
                                   v-model="cost.uc_6_1">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        6.2
                    </td>
                    <td class="">
                        запорно-переговорных устройств жилого дома
                    </td>
                    <td class="">
                        квартир
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_6_1"
                                   id="uc_6_1"
                                   class="form-control"
                                   v-model="cost.uc_6_2">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        6.3
                    </td>
                    <td class="">
                        лифта
                    </td>
                    <td class="">
                        руб.
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_6_3"
                                   id="uc_6_3"
                                   class="form-control"
                                   v-model="cost.uc_6_3">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        7
                    </td>
                    <td class="">
                        Обращение с твердыми коммунальными отходами
                    </td>
                    <td class="">
                        руб.
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_7"
                                   id="uc_7"
                                   class="form-control"
                                   v-model="cost.uc_7">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        8
                    </td>
                    <td class="">
                        Санитарное содержание вспомогательных помещений жилого дома
                    </td>
                    <td class="">
                        руб.
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_8"
                                   id="uc_8"
                                   class="form-control"
                                   v-model="cost.uc_8">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        9
                    </td>
                    <td class="">
                        Управление общим имуществом совместного домовладения
                    </td>
                    <td class="">
                        руб.
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_9"
                                   id="uc_9"
                                   class="form-control"
                                   v-model="cost.uc_9">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        10
                    </td>
                    <td class="">
                        Текущий ремонт за счет средств бюджета
                    </td>
                    <td class="">
                        руб.
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="uc_10"
                                   id="uc_10"
                                   class="form-control"
                                   v-model="cost.uc_10">
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <button type="submit" class="form-control btn btn-primary mt-3">{{ $t('global_buttons.save') }}</button>
        </div>
    </form>
</template>

<script>
import useCosts from "../../../composables/costs";
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
        const {errors, cost, getCost, updateCost} = useCosts();

        onMounted(() => {
            getCost(props.id);
        });

        const saveCost = async () => {
            await updateCost(props.id);
        }

        return {
            errors,
            cost,
            saveCost
        }
    }
}
</script>
