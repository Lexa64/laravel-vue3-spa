<template>
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
