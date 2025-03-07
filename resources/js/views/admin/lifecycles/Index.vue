<template>
    <div>
        <h1>Расчёт жизненного цикла</h1>
        <div class="container mt-4">
            <form @submit.prevent="saveLifecycle">
                <!-- 1. Общая информация -->
                <h3>1. Общая информация</h3>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">1.1 Наименование объекта</label>
                        <input type="text" class="form-control" v-model="lifecycle.name">
                    </div>
                    <div class="col-12">
                        <label class="form-label">1.2 Населенный пункт</label>
                        <input type="text" class="form-control" v-model="lifecycle.city">
                    </div>
                    <div class="col-12">
                        <label class="form-label">1.3 Материал стен</label>
                        <select class="form-select" v-model="lifecycle.wall_material">
                            <option value="крупнопанельные">Крупнопанельные</option>
                            <option value="мелкоштучные элементы">Мелкоштучные элементы (кирпич, блоки)</option>
                            <option value="каркасные системы">Каркасные системы</option>
                            <option value="деревянные">Деревянные</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.4 Этажность</label>
                        <input type="number" class="form-control" v-model="lifecycle.floors">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.5 Общая площадь жилых помещений (м²)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.living_area" @input="handleInput">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.6 Общая площадь вспомогательных помещений (м²)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.auxiliary_area">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.7 Общая площадь жилого дома (м²)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.total_area">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.8 Количество квартир</label>
                        <input type="number" class="form-control" v-model="lifecycle.apartments_count">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.9 Количество проживающих</label>
                        <input type="number" class="form-control" v-model="lifecycle.residents_count">
                    </div>
                    <div class="col-12">
                        <label class="form-label">1.10 Система отопления здания</label>
                        <select class="form-select" v-model="lifecycle.heating_system">
                            <option value="централизованный источник">От централизованного источника</option>
                            <option value="децентрализованная газовая">Децентрализованная газовая</option>
                            <option value="децентрализованная электрическая">Децентрализованная электрическая</option>
                            <option value="другое">Другое</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">1.11 Плиты пищеприготовления</label>
                        <select class="form-select" v-model="lifecycle.cooking_plates">
                            <option value="электрические">Электрические</option>
                            <option value="газовые">Газовые</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.12 Мусоропровод</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_garbage_chute">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.13 Лифт</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_elevator">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.14 Запорно-переговорные устройства</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_intercom">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                </div>
                <!-- 2. Контрольные события -->
                <h3 class="mt-4">2. Контрольные события</h3>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">2.1 Длительность жизненного цикла здания</label>
                        <input type="number" class="form-control" v-model="lifecycle.lifecycle_duration">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.2 Стоимостные показатели в ценах на год</label>
                        <input type="number" class="form-control" v-model="lifecycle.price_year">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.3 Дата выдачи задания на проектирование</label>
                        <input type="date" class="form-control" v-model="lifecycle.design_task_date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.4 Дата начала строительства</label>
                        <input type="date" class="form-control" v-model="lifecycle.construction_start_date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.5 Дата приемки объекта в эксплуатацию</label>
                        <input type="date" class="form-control" v-model="lifecycle.commissioning_date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.6 Дата планируемого проведения текущего ремонта 1</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.7 Дата планируемого проведения текущего ремонта 2</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.8 Дата планируемого проведения текущего ремонта 3</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_3">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.9 Дата планируемого проведения текущего ремонта 4</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_4">
                    </div>
<!--                    <div class="col-md-6">
                        <label class="form-label">2.10 Дата планируемого проведения текущего ремонта 5</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_5">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.11 Дата планируемого проведения текущего ремонта 6</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_6">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">2.12 Дата планируемого проведения капитального ремонта 1</label>
                        <input type="date" class="form-control" v-model="lifecycle.overhaul_date_1">
                    </div>
<!--                    <div class="col-md-6">
                        <label class="form-label">2.13 Дата планируемого проведения капитального ремонта 2</label>
                        <input type="date" class="form-control" v-model="lifecycle.overhaul_date_2">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">2.14 Дата окончания жизненного цикла</label>
                        <input type="date" class="form-control" v-model="lifecycle.lifecycle_end_date">
                    </div>
                </div>
                <hr class="my-4 border-4 border-dark">
                <!-- 3. Стоимостные показатели -->
                <h3 class="mt-4">3. Стоимостные показатели</h3>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">3.1 Стоимость строительства (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.construction_cost">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.2 Стоимость текущего ремонта 1 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.3 Стоимость текущего ремонта 2 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.4 Стоимость текущего ремонта 3 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_3">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.5 Стоимость текущего ремонта 4 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_4">
                    </div>
<!--                    <div class="col-md-6">
                        <label class="form-label">3.6 Стоимость текущего ремонта 5 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_5">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.7 Стоимость текущего ремонта 6 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_6">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">3.8 Стоимость капитального ремонта 1 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.overhaul_cost_1">
                    </div>
<!--                    <div class="col-md-6">
                        <label class="form-label">3.9 Стоимость капитального ремонта 2 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.overhaul_cost_2">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">3.10 Стоимость сноса (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.demolition_cost">
                    </div>
                </div>
                <!-- 4. Эксплуатационные ресурсы -->
                <h3 class="mt-4">4. Эксплуатационные ресурсы</h3>
                <div class="row g-3">
<!--                    <div class="col-12">
                        <label class="form-label">4.1 Потребление электроэнергии, всего (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.total_electricity">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">4.1.1 Электроэнергия на освещение вспомогательных помещений (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.auxiliary_electricity">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.1.2 Электроэнергия на работу лифта (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.elevator_electricity">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.1.3 Электроэнергия, потребляемая домохозяйствами (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.household_electricity">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.1.4 Электроэнергия на отопление (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.heating_electricity">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.2 Потребление природного газа (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.natural_gas">
                    </div>
                    <div class="col-12">
                        <label class="form-label">4.3 Тепловая энергия, всего (Гкал)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.total_thermal_energy">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.3.1 Теплоснабжение (отопление) (Гкал)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.heating_thermal_energy">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.3.2 Горячее водоснабжение (Гкал)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.hot_water_thermal_energy">
                    </div>
                    <div class="col-12">
                        <label class="form-label">4.4 Вода, всего (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.total_water">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.4.1 Холодная вода (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.cold_water">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.4.2 Горячая вода (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.hot_water">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.5 Водоотведение (канализация) (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.sewage">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.6 Обращение с твердыми коммунальными отходами (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.solid_waste">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
<!--                        <button @click="calculate" class="btn btn-primary" style="margin-left: 20px;">Рассчитать</button>-->
                    </div>
                </div>
            </form>
            <h2 v-if="lifecycle.construction_cost!==null">Расчётная стоимость: {{ (lifecycle.construction_cost * 108).toFixed(2) }}</h2>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: 'LifecycleForm',
    data() {
        return {
            forecastIndices: [],
            years: [2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026],
            lifecycle: {
                // 1. Общая информация
                name: 'Возведение многоквартирного 9-этажного жилого дома в г. Гродно',
                city: 'г. Гродно',
                wall_material: 'крупнопанельные',
                floors: 9,
                living_area: 6418.9,
                auxiliary_area: 1431,
                total_area: 7849.90,
                apartments_count: 108,
                residents_count: 237,
                heating_system: 'централизованный источник',
                cooking_plates: 'газовые',
                has_garbage_chute: true,
                has_elevator: true,
                has_intercom: true,
                // 2. Контрольные события
                lifecycle_duration: 50,
                price_year: 2022,
                design_task_date: '2022-10-01',
                construction_start_date: '2022-11-01',
                commissioning_date: '2023-01-01',
                maintenance_date_1: '2031-01-01',
                maintenance_date_2: '2039-01-01',
                maintenance_date_3: '2056-01-01',
                maintenance_date_4: '2064-01-01',
                /*maintenance_date_5: '',
                maintenance_date_6: '',*/
                overhaul_date_1: '2048-01-01',
                /*overhaul_date_2: '',*/
                lifecycle_end_date: '2073-01-01',
                // 3. Стоимостные показатели
                construction_cost: 0,
                maintenance_cost_1: 0,
                maintenance_cost_2: 0,
                maintenance_cost_3: 0,
                maintenance_cost_4: 0,
                maintenance_cost_5: 0,
                maintenance_cost_6: 0,
                overhaul_cost_1: 0,
                overhaul_cost_2: 0,
                demolition_cost: 0,
                // 4. Эксплуатационные ресурсы
                total_electricity: 0,
                auxiliary_electricity: 2437,
                elevator_electricity: 3673,
                household_electricity: 259200,
                heating_electricity: 0,
                natural_gas: 2592,
                total_thermal_energy: 2592,
                heating_thermal_energy: 825.8,
                hot_water_thermal_energy: 356.07,
                total_water: 9453.01,
                cold_water: 5470.54,
                hot_water: 3982.47,
                sewage: 9453.01,
                solid_waste: 63.16
            },
            isLoading: false,
            error: null,
            data: null,
            final: null
        };
    },
    async created() {
        await this.loadData();
    },
    methods: {
        handleInput(event) {
            let temp = this.data[0].find(item => item.year === 2022)

            this.lifecycle.construction_cost = (this.lifecycle.living_area * temp.months['Ноябрь'] / 1000).toFixed(2);
            this.lifecycle.maintenance_cost_1 = (JSON.parse(this.data[2][12].values)[2015] * JSON.parse(this.data[2][12].values)[2016] *
                JSON.parse(this.data[2][12].values)[2017] * JSON.parse(this.data[2][12].values)[2018] * JSON.parse(this.data[2][12].values)[2019] *
                JSON.parse(this.data[2][12].values)[2020] * JSON.parse(this.data[2][12].values)[2021] * this.data[1][8]['data'] * 0.1375 / 10000 * 7849.9).toFixed(2);
            this.lifecycle.maintenance_cost_2 = this.lifecycle.maintenance_cost_1;
            this.lifecycle.maintenance_cost_3 = this.lifecycle.maintenance_cost_1;
            this.lifecycle.maintenance_cost_4 = this.lifecycle.maintenance_cost_1;
            this.lifecycle.overhaul_cost_1 = (JSON.parse(this.data[2][12].values)[2015] * JSON.parse(this.data[2][12].values)[2016] *
                JSON.parse(this.data[2][12].values)[2017] * JSON.parse(this.data[2][12].values)[2018] * JSON.parse(this.data[2][12].values)[2019] *
                JSON.parse(this.data[2][12].values)[2020] * JSON.parse(this.data[2][12].values)[2021] * this.data[1][8]['data'] / 10000 * 7849.9).toFixed(2)
            this.lifecycle.demolition_cost = this.lifecycle.construction_cost.toFixed(2)

        },
        async saveLifecycle() {
            try {
                this.isLoading = true
                this.error = null
                const response = await this.lifecycle.id
                    ? axios.put(`/api/lifecycles/${this.lifecycle.id}`, this.lifecycle)
                    : axios.post('/api/lifecycles', this.lifecycle)
                this.$emit('saved', response.data)
                this.isLoading = false
            } catch (error) {
                this.error = error.response?.data?.message || 'Произошла ошибка при сохранении'
                this.isLoading = false
            }
        },
        async loadLifecycle(id) {
            try {
                this.isLoading = true
                this.error = null

                const response = await axios.get(`/api/lifecycles/${id}`)
                this.lifecycle = response.data

                this.isLoading = false
            } catch (error) {
                this.error = error.response?.data?.message || 'Произошла ошибка при загрузке'
                this.isLoading = false
            }
        },
        /*async loadData() {
            try {
                const response = await axios.get("/api/forecast-indices");
                this.forecastIndices = response.data.map((item) => ({
                    ...item,
                    values: typeof item.values === 'string' ? JSON.parse(item.values) : item.values,
                }));

                if (this.forecastIndices.length > 0) {
                    this.years = Object.keys(this.forecastIndices[0].values);
                }
            } catch (error) {
                console.error("Ошибка при загрузке данных:", error);
            }
        },*/
        async loadData() {
            try {
                const response = await axios.get("/api/forecast-indices");

                this.forecastIndices = response.data.map((item) => ({
                    ...item,
                    values: typeof item.values === 'string' ? JSON.parse(item.values) : item.values,
                }));

                const response1 = await axios.post("/api/lifecycle/calculate");

                this.data = []

                let test = JSON.parse(response1.data.two)
                this.data[0] = JSON.parse(test[0].values) // Предельная стоимость
                this.data[1] = JSON.parse(test[1].values) // Ремонт и модернизация
                this.data[2] = JSON.parse(response1.data.one) // Прогнозные индексы

                //console.log(this.data[0])
                let temp = this.data[0].find(item => item.year === 2022)
                console.log(this.data[1][8]['data'])

                /*if (this.forecastIndices.length > 0) {
                    this.years = Object.keys(this.forecastIndices[0].values);
                }*/

                let result = [];
                result['i37'] = this.lifecycle.living_area * temp.months['Ноябрь'] / 1000;
                result['i38'] = JSON.parse(this.data[2][12].values)[2015] * JSON.parse(this.data[2][12].values)[2016] *
                    JSON.parse(this.data[2][12].values)[2017] * JSON.parse(this.data[2][12].values)[2018] * JSON.parse(this.data[2][12].values)[2019] *
                    JSON.parse(this.data[2][12].values)[2020] * JSON.parse(this.data[2][12].values)[2021] * this.data[1][8]['data'] * 0.1375 / 10000 * 7849.9;
                result['i44'] = JSON.parse(this.data[2][12].values)[2015] * JSON.parse(this.data[2][12].values)[2016] *
                    JSON.parse(this.data[2][12].values)[2017] * JSON.parse(this.data[2][12].values)[2018] * JSON.parse(this.data[2][12].values)[2019] *
                    JSON.parse(this.data[2][12].values)[2020] * JSON.parse(this.data[2][12].values)[2021] * this.data[1][8]['data'] / 10000 * 7849.9;
                result['i46'] = result['i37'] / 2 * 0.3;
                console.log(result['i37']);

                this.lifecycle.construction_cost = result['i37'].toFixed(2)
                this.lifecycle.maintenance_cost_1 = result['i38'].toFixed(2)
                this.lifecycle.maintenance_cost_2 = result['i38'].toFixed(2)
                this.lifecycle.maintenance_cost_3 = result['i38'].toFixed(2)
                this.lifecycle.maintenance_cost_4 = result['i38'].toFixed(2)
                this.lifecycle.overhaul_cost_1 = result['i44'].toFixed(2)
                this.lifecycle.demolition_cost = result['i46'].toFixed(2)

                this.final = result['i37'];

            } catch (error) {
                console.error("Ошибка при загрузке данных:", error);
            }
        },
        async updateItems() {
            try {
                const dataToSend = this.forecastIndices.map((item) => ({
                    ...item,
                    values: JSON.stringify(item.values), // Преобразуем объект в строку
                }));

                await axios.put("/api/forecast-indices/bulk-update", {data: dataToSend});
                alert("Данные успешно сохранены!");
            } catch (error) {
                console.error("Ошибка при сохранении данных:", error);
                alert("Произошла ошибка при сохранении данных.");
            }
        },
        async deleteItem(id) {
            try {
                await axios.delete(`/api/forecast-indices/${id}`);
                this.forecastIndices = this.forecastIndices.filter((item) => item.id !== id);
            } catch (error) {
                console.error("Ошибка при удалении данных:", error);
            }
        },
        calculate() {
            console.log(this.lifecycle.living_area)
        },
    },
};
</script>

<style scoped>
.table {
    border-radius: 0.5rem;
    overflow: hidden;
}

.table th {
    background-color: #0d6efd;
    color: white;
}

.table td {
    vertical-align: middle;
}

.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}

.ml-2 {
    margin-left: 0.5rem;
}
</style>
