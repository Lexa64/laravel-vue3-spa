<template>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Материал стен и этажность жилых домов</th>
                <th>Капитальный ремонт (до 30 лет)</th>
                <th>Капитальный ремонт (более 30 лет)</th>
                <th>Модернизация (всего)</th>
                <th>Тепловая модернизация</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in buildingCosts" :key="item.id">
                <td>{{ item.wall_material }} - {{ item.floors }}</td>
                <td><input v-model="item.repair_cost_under_30" type="number" class="form-control" /></td>
                <td><input v-model="item.repair_cost_over_30" type="number" class="form-control" /></td>
                <td><input v-model="item.modernization_total" type="number" class="form-control" /></td>
                <td><input v-model="item.modernization_thermal" type="number" class="form-control" /></td>
                <td>
                    <button @click="updateItem(item)" class="btn btn-primary">Сохранить</button>
                    <button @click="deleteItem(item.id)" class="btn btn-danger">Удалить</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            buildingCosts: [],
        };
    },
    async created() {
        await this.fetchData();
    },
    methods: {
        async fetchData() {
            const response = await axios.get('/api/building-costs');
            this.buildingCosts = response.data;
        },
        async updateItem(item) {
            await axios.put(`/api/building-costs/${item.id}`, item);
            alert('Данные обновлены!');
        },
        async deleteItem(id) {
            await axios.delete(`/api/building-costs/${id}`);
            await this.fetchData();
            alert('Запись удалена!');
        },
    },
};
</script>

<style scoped>
.table {
    margin-top: 20px;
}
</style>
