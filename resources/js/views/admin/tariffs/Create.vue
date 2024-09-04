<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="">
            <p v-for="error in v" :key="error" class="">
                {{ error }}
            </p>
        </div>
    </div>
<div class="container">
    <form class="" @submit.prevent="saveTariff">
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
                    <td class="">
                        1.1.1
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
                                   name="ut_1_1_1_economically_justified"
                                   id="ut_1_1_1_economically_justified"
                                   class="form-control"
                                   v-model="form.ut_1_1_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_1_1_state_subsidized"
                                   id="ut_1_1_1_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_1_1_1_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        1.1.2
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
                                   name="ut_1_1_2_economically_justified"
                                   id="ut_1_1_2_economically_justified"
                                   class="form-control"
                                   v-model="form.ut_1_1_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_1_2_state_subsidized"
                                   id="ut_1_1_2_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_1_1_2_state_subsidized">
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
                                   v-model="form.ut_1_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_2_state_subsidized"
                                   id="ut_1_2_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_1_2_state_subsidized">
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
                                   v-model="form.ut_1_3_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_3_state_subsidized"
                                   id="ut_1_3_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_1_3_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        1.4
                    </td>
                    <td class="">
                        Электроэнергия, потребляемая на отопление зданий
                    </td>
                    <td class="">
                        кВт*ч
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_4_economically_justified"
                                   id="ut_1_4_economically_justified"
                                   class="form-control"
                                   v-model="form.ut_1_4_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_1_4_state_subsidized"
                                   id="ut_1_4_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_1_4_state_subsidized">
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
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                <tr class="">
                    <td class="">
                        2.1
                    </td>
                    <td class="">
                        при наличии индивидуальных отопительных приборов
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_2_1_economically_justified"
                                   id="ut_2_1_economically_justified"
                                   class="form-control"
                                   v-model="form.ut_2_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_2_1_state_subsidized"
                                   id="ut_2_1_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_2_1_state_subsidized">
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        2.2
                    </td>
                    <td class="">
                        при отсутствии индивидуальных отопительных приборов
                    </td>
                    <td class="">
                        м³
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_2_2_economically_justified"
                                   id="ut_2_2_economically_justified"
                                   class="form-control"
                                   v-model="form.ut_2_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_2_2_state_subsidized"
                                   id="ut_2_2_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_2_2_state_subsidized">
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
                    <td class=""></td>
                    <td class=""></td>
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
                                   v-model="form.ut_3_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_3_1_state_subsidized"
                                   id="ut_3_1_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_3_1_state_subsidized">
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
                                   v-model="form.ut_3_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_3_2_state_subsidized"
                                   id="ut_3_2_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_3_2_state_subsidized">
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
                    <td class=""></td>
                    <td class=""></td>
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
                                   v-model="form.ut_4_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_4_1_state_subsidized"
                                   id="ut_4_1_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_4_1_state_subsidized">
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
                                   v-model="form.ut_4_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_4_2_state_subsidized"
                                   id="ut_4_2_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_4_2_state_subsidized">
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
                                   v-model="form.ut_5_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_5_state_subsidized"
                                   id="ut_5_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_5_state_subsidized">
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
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
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
                                   v-model="form.ut_6_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_6_1_state_subsidized"
                                   id="ut_6_1_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_6_1_state_subsidized">
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
                                   v-model="form.ut_6_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_6_2_state_subsidized"
                                   id="ut_6_2_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_6_2_state_subsidized">
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
                                   v-model="form.ut_6_3_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_6_3_state_subsidized"
                                   id="ut_6_3_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_6_3_state_subsidized">
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
                                   name="ut_7_1_economically_justified"
                                   id="ut_7_1_economically_justified"
                                   class="form-control"
                                   v-model="form.ut_7_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_7_1_state_subsidized"
                                   id="ut_7_1_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_7_1_state_subsidized">
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
                                   v-model="form.ut_7_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_7_2_state_subsidized"
                                   id="ut_7_2_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_7_2_state_subsidized">
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
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
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
                                   v-model="form.ut_8_1_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_8_1_state_subsidized"
                                   id="ut_8_1_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_8_1_state_subsidized">
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
                                   v-model="form.ut_8_2_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_8_2_state_subsidized"
                                   id="ut_8_2_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_8_2_state_subsidized">
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
                                   v-model="form.ut_9_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_9_state_subsidized"
                                   id="ut_9_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_9_state_subsidized">
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
                                   v-model="form.ut_10_economically_justified">
                        </div>
                    </td>
                    <td class="">
                        <div class="mt-1">
                            <input type="text"
                                   name="ut_10_state_subsidized"
                                   id="ut_10_state_subsidized"
                                   class="form-control"
                                   v-model="form.ut_10_state_subsidized">
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
                           v-model="form.year">
                </div>
            </div>

            <div>
                <label for="decree_number" class="">{{ $t('utility_tariffs.decree_number') }}</label>
                <div class="mt-1">
                    <input type="text" name="decree_number" id="decree_number"
                           class="form-control"
                           v-model="form.decree_number">
                </div>
            </div>

            <button type="submit" class="form-control btn btn-primary mt-3">{{ $t('global_buttons.create') }}</button>
        </div>
    </form>
</div>
</template>

<script>
import {reactive} from "vue";
import useTariffs from "../../../composables/tariffs";

export default {
    setup() {
        const form = reactive({
            'ut_1_1_1_economically_justified': '',
            'ut_1_1_2_economically_justified': '',
            'ut_1_2_economically_justified': '',
            'ut_1_3_economically_justified': '',
            'ut_1_4_economically_justified': '',
            'ut_2_1_economically_justified' : '',
            'ut_2_2_economically_justified' : '',
            'ut_3_1_economically_justified': '',
            'ut_3_2_economically_justified': '',
            'ut_4_1_economically_justified': '',
            'ut_4_2_economically_justified': '',
            'ut_5_economically_justified': '',
            'ut_6_1_economically_justified': '',
            'ut_6_2_economically_justified': '',
            'ut_6_3_economically_justified': '',
            'ut_7_1_economically_justified': '',
            'ut_7_2_economically_justified': '',
            'ut_8_1_economically_justified': '',
            'ut_8_2_economically_justified': '',
            'ut_9_economically_justified': '',
            'ut_10_economically_justified': '',
            'ut_1_1_1_state_subsidized': '',
            'ut_1_1_2_state_subsidized': '',
            'ut_1_2_state_subsidized': '',
            'ut_1_3_state_subsidized': '',
            'ut_1_4_state_subsidized': '',
            'ut_2_1_state_subsidized': '',
            'ut_2_2_state_subsidized': '',
            'ut_3_1_state_subsidized': '',
            'ut_3_2_state_subsidized': '',
            'ut_4_1_state_subsidized': '',
            'ut_4_2_state_subsidized': '',
            'ut_5_state_subsidized': '',
            'ut_6_1_state_subsidized': '',
            'ut_6_2_state_subsidized': '',
            'ut_6_3_state_subsidized': '',
            'ut_7_1_state_subsidized': '',
            'ut_7_2_state_subsidized': '',
            'ut_8_1_state_subsidized': '',
            'ut_8_2_state_subsidized': '',
            'ut_9_state_subsidized': '',
            'ut_10_state_subsidized': '',
            'year': '',
            'decree_number': '',
        });

        const {errors, storeTariff} = useTariffs();

        const saveTariff = async () => {
            await storeTariff({...form});
        }

        return {
            form,
            errors,
            saveTariff
        }
    }
}
</script>
