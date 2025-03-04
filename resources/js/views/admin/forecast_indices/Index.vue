<template>
    <div>
        <h1>Прогнозные индексы</h1>
        <table class="table table-hover table-bordered">
            <thead class="table-light">
            <tr>
                <th>Период</th>
                <th v-for="year in years" :key="year">{{ year }}</th>
                <!--<th>Действия</th>-->
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in forecastIndices" :key="item.id">
                <td>{{ item.period }}</td>
                <td v-for="year in years" :key="year">
                    <input
                        v-model="item.values[year]"
                        class="form-control"
                        type="text"
                    />
                </td>
                <!--<td>
                    <button @click="deleteItem(item.id)" class="btn btn-danger">
                        Удалить
                    </button>
                </td>-->
            </tr>
            </tbody>
        </table>
        <div>
            <button @click="addYear" class="btn btn-primary">Добавить год</button>
            <button @click="updateItems" class="btn btn-success ml-2">Сохранить</button>
        </div>
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th rowspan="2">Материал стен и этажность жилых домов</th>
                    <th colspan="2">Капитальный ремонт</th>
                    <th colspan="2">Модернизация</th>
                </tr>
                <tr>
                    <th>до 30 лет</th>
                    <th>более 30 лет</th>
                    <th>всего</th>
                    <th>в том числе тепловая модернизация</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="5"><strong>Кирпичные и каменные:</strong></td>
                </tr>
                <tr>
                    <td>2-3-этажные</td>
                    <td>1427</td>
                    <td>2573</td>
                    <td>3313</td>
                    <td>891</td>
                </tr>
                <tr>
                    <td>4-5-этажные</td>
                    <td>904</td>
                    <td>1545</td>
                    <td>2168</td>
                    <td>604</td>
                </tr>
                <tr>
                    <td>6-10-этажные</td>
                    <td>921</td>
                    <td>1550</td>
                    <td>1792</td>
                    <td>648</td>
                </tr>
                <tr>
                    <td>12-этажные</td>
                    <td>752</td>
                    <td>1326</td>
                    <td>1810</td>
                    <td>685</td>
                </tr>
                <tr>
                    <td colspan="5"><strong>Крупнопанельные и объемно-блочные:</strong></td>
                </tr>
                <tr>
                    <td>2-3-этажные</td>
                    <td>1529</td>
                    <td>2672</td>
                    <td>3216</td>
                    <td>732</td>
                </tr>
                <tr>
                    <td>4-5-этажные</td>
                    <td>904</td>
                    <td>1507</td>
                    <td>1709</td>
                    <td>802</td>
                </tr>
                <tr>
                    <td>6-10-этажные</td>
                    <td>921</td>
                    <td>1565</td>
                    <td>1488</td>
                    <td>697</td>
                </tr>
                <tr>
                    <td>12-этажные</td>
                    <td>776</td>
                    <td>1391</td>
                    <td>1531</td>
                    <td>744</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            forecastIndices: [],
            years: [2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026],
        };
    },
    async created() {
        await this.loadData();
    },
    methods: {
        async loadData() {
            try {
                const response = await axios.get("/api/forecast-indices");
                this.forecastIndices = response.data.map((item) => ({
                    ...item,
                    values: typeof item.values === 'string' ? JSON.parse(item.values) : item.values, // Преобразуем строку в объект, если это необходимо
                }));

                if (this.forecastIndices.length > 0) {
                    this.years = Object.keys(this.forecastIndices[0].values);
                }
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
        addYear() {
            const newYear = parseInt(this.years[this.years.length - 1]) + 1;
            this.years.push(newYear);
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
