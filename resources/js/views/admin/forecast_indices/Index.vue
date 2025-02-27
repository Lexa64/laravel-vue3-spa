<template>
    <div>
        <h1>Прогнозные индексы</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Период</th>
                <th v-for="year in years" :key="year">{{ year }}</th>
<!--                <th>Действия</th>-->
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
<!--                <td>
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
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            forecastIndices: [], // Данные с бэкенда
            years: [2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026], // Года
        };
    },
    async created() {
        // Загружаем данные с бэкенда
        await this.loadData();
    },
    methods: {
        // Загрузка данных с бэкенда
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
        // Сохранение всех записей
        async updateItems() {
            try {
                // Преобразуем values в JSON-строку для каждой записи
                const dataToSend = this.forecastIndices.map((item) => ({
                    ...item,
                    values: JSON.stringify(item.values), // Преобразуем объект в строку
                }));

                // Отправляем все записи на сервер
                await axios.put("/api/forecast-indices/bulk-update", {data: dataToSend});
                alert("Данные успешно сохранены!");
            } catch (error) {
                console.error("Ошибка при сохранении данных:", error);
                alert("Произошла ошибка при сохранении данных.");
            }
        },
        // Удаление данных
        async deleteItem(id) {
            try {
                await axios.delete(`/api/forecast-indices/${id}`);
                this.forecastIndices = this.forecastIndices.filter((item) => item.id !== id);
            } catch (error) {
                console.error("Ошибка при удалении данных:", error);
            }
        },
        // Добавление нового года
        addYear() {
            const newYear = parseInt(this.years[this.years.length - 1]) + 1;
            this.years.push(newYear);
        },
    },
};
</script>

<style scoped>
table {
    width: 100%;
}

th,
td {
    text-align: center;
}

.ml-2 {
    margin-left: 0.5rem;
}
</style>
