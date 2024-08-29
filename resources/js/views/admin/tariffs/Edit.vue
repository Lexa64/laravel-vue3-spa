<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="">
            <p v-for="error in v" :key="error" class="">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="" v-on:submit.prevent="saveTariff">
        <div class="container w-75">
            <table class="table table-striped" style="">
                <thead>
                <tr>
                    <th class="">
                        {{ $t('utility_tariffs_table.th1') }}
                    </th>
                    <th class="">
                        {{ $t('utility_tariffs_table.th2') }}
                    </th>
                    <th class="">
                        {{ $t('utility_tariffs_table.th3') }}
                    </th>
                    <th class="">
                        {{ $t('utility_tariffs_table.th4') }}
                    </th>
                    <th class="">
                        {{ $t('utility_tariffs_table.th5') }}
                    </th>
                </tr>
                </thead>

                <tbody class="">
                <tr class="">
                    <td class="">
                        1
                    </td>
                    <td class="">
                        Электроэнергия, в т.ч.
                    </td>
                    <td class="">
                        кВт*ч
                    </td>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                <tr class="">
                    <td class="">
                        1.1
                    </td>
                    <td class="">
                        Электроэнергия, потребляемая на освещение вспомогательных помещений, на работу оборудования, за исключением лифта
                    </td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                <tr class="">
                    <td class=""></td>
                    <td class="">
                        в областях
                    </td>
                    <td class="">
                        м²
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_1_1_economically_justified"
                                   id="ut_1_1_1_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_1_1_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_1_1_state_subsidized"
                                   id="ut_1_1_1_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_1_1_1_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class=""></td>
                    <td class="">
                        в г. Минске
                    </td>
                    <td class="">
                        м²
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_1_2_economically_justified"
                                   id="ut_1_1_2_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_1_1_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_1_2_state_subsidized"
                                   id="ut_1_1_2_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_1_1_2_state_subsidized">
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
                        на одного проживающего в месяц
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_2_economically_justified"
                                   id="ut_1_2_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_1_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_2_state_subsidized"
                                   id="ut_1_2_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_1_2_state_subsidized">
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
                                   name="ut_1_3_economically_justified"
                                   id="ut_1_3_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_1_3_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_3_state_subsidized"
                                   id="ut_1_3_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_1_3_state_subsidized">
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
                        человек
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_2_economically_justified"
                                   id="ut_2_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_2_state_subsidized"
                                   id="ut_2_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_2_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        3
                    </td>
                    <td class="">
                        Тепловая энергия, в т.ч.
                    </td>
                    <td class="">
                        Гкал
                    </td>
                    <td class="">
                    </td>
                    <td class="">
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
                                   name="ut_3_1_economically_justified"
                                   id="ut_3_1_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_3_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_3_1_state_subsidized"
                                   id="ut_3_1_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_3_1_state_subsidized">
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
                                   name="ut_3_2_economically_justified"
                                   id="ut_3_2_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_3_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_3_2_state_subsidized"
                                   id="ut_3_2_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_3_2_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        4
                    </td>
                    <td class="">
                        Вода, в т.ч.
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                    </td>
                    <td class="">
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
                                   name="ut_4_1_economically_justified"
                                   id="ut_4_1_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_4_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_4_1_state_subsidized"
                                   id="ut_4_1_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_4_1_state_subsidized">
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
                                   name="ut_4_2_economically_justified"
                                   id="ut_4_2_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_4_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_4_2_state_subsidized"
                                   id="ut_4_2_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_4_2_state_subsidized">
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
                                   name="ut_5_economically_justified"
                                   id="ut_5_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_5_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_5_state_subsidized"
                                   id="ut_5_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_5_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        6
                    </td>
                    <td class="">
                        Техническое обслуживание, в т.ч.
                    </td>
                    <td class="">
                    </td>
                    <td class="">
                    </td>
                    <td class="">
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
                        м²
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_6_1_economically_justified"
                                   id="ut_6_1_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_6_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_6_1_state_subsidized"
                                   id="ut_6_1_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_6_1_state_subsidized">
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
                        на 1 квартиру в месяц
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_6_2_economically_justified"
                                   id="ut_6_2_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_6_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_6_2_state_subsidized"
                                   id="ut_6_2_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_6_2_state_subsidized">
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
                        м²
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_6_3_economically_justified"
                                   id="ut_6_3_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_6_3_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_6_3_state_subsidized"
                                   id="ut_6_3_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_6_3_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        7
                    </td>
                    <td class="">
                        Обращение с твердыми коммунальными отходами (из расчета 2,68м³ отходов на 1 человека в год)
                    </td>
                    <td class="">
                    </td>
                    <td class="">
                    </td>
                    <td class="">
                    </td>
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
                                   name="ut_7_1_economically_justified"
                                   id="ut_7_1_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_7_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_7_1_state_subsidized"
                                   id="ut_7_1_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_7_1_state_subsidized">
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
                                   name="ut_7_2_economically_justified"
                                   id="ut_7_2_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_7_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_7_2_state_subsidized"
                                   id="ut_7_2_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_7_2_state_subsidized">
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
                    </td>
                    <td class="">
                    </td>
                    <td class="">
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        8.1
                    </td>
                    <td class="">
                        в областях
                    </td>
                    <td class="">
                        м²
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_8_1_economically_justified"
                                   id="ut_8_1_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_8_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_8_1_state_subsidized"
                                   id="ut_8_1_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_8_1_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        8.2
                    </td>
                    <td class="">
                        в г. Минске
                    </td>
                    <td class="">
                        м²
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_8_2_economically_justified"
                                   id="ut_8_2_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_8_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_8_2_state_subsidized"
                                   id="ut_8_2_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_8_2_state_subsidized">
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
                        м²
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_9_economically_justified"
                                   id="ut_9_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_9_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_9_state_subsidized"
                                   id="ut_9_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_9_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        10
                    </td>
                    <td class="">
                        Капитальный ремонт
                    </td>
                    <td class="">
                        м²
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_10_economically_justified"
                                   id="ut_10_economically_justified"
                                   class="form-control"
                                   v-model="tariff.ut_10_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_10_state_subsidized"
                                   id="ut_10_state_subsidized"
                                   class="form-control"
                                   v-model="tariff.ut_10_state_subsidized">
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <div>
                <label for="year" class="">{{ $t('utility_tariffs.year') }}</label>
                <div class="mt-1">
                    <input type="text" name="year" id="year"
                           class="form-control"
                           v-model="tariff.year">
                </div>
            </div>

            <div>
                <label for="decree_number" class="">{{ $t('utility_tariffs.decree_number') }}</label>
                <div class="mt-1">
                    <input type="text" name="decree_number" id="decree_number"
                           class="form-control"
                           v-model="tariff.decree_number">
                </div>
            </div>

            <button type="submit" class="form-control btn btn-primary mt-3">{{ $t('global_buttons.save') }}</button>
        </div>
    </form>
</template>

<script>
import useTariffs from "../../../composables/tariffs";
import {onMounted} from "vue";

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const {errors, tariff, getTariff, updateTariff} = useTariffs();

        onMounted(() => {
            getTariff(props.id);
        });

        const saveTariff = async () => {
            await updateTariff(props.id);
        }

        return {
            errors,
            tariff,
            saveTariff
        }
    }
}
</script>
