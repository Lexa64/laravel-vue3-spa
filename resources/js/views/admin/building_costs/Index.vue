<template>
    <div class="container mt-5">
        <h1>Стоимость ремонта и модернизации жилых домов</h1>
        <BuildingCostTable />
    </div>
</template>

<script>
import BuildingCostTable from '@/components/lifecycle/BuildingCostTable.vue';

export default {
    components: {
        BuildingCostTable,
    },
};
</script>

<style>
.container {
    max-width: 1200px;
}
</style>
