<template>
    <div class="">
        <div class="">
            <div class="">
                <router-link :to="{ name: 'costs.create' }" class="btn btn-primary" style="margin-bottom: 10px;">{{ $t('utility_costs.create') }}</router-link>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th class="">
                    <span class="">
                        {{ $t('global_fields.id') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('utility_costs.electricity') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('utility_costs.gas') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('utility_costs.thermal_energy') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('utility_costs.water') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('utility_costs.sewerage') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('utility_costs.updated_at') }}
                    </span>
                </th>
                <th class="">
                </th>
            </tr>
            </thead>

            <tbody class="">
            <template v-for="item in costs" :key="item.id">
                <tr class="">
                    <td class="">
                        {{ item.id }}
                    </td>
                    <td class="">
                        {{ item.uc_1 }}
                    </td>
                    <td class="">
                        {{ item.uc_2 }}
                    </td>
                    <td class="">
                        {{ item.uc_3 }}
                    </td>
                    <td class="">
                        {{ item.uc_4 }}
                    </td>
                    <td class="">
                        {{ item.uc_5 }}
                    </td>
                    <td class="">
                        {{ moment(item.updated_at).format('YYYY-MM-DD') }}
                    </td>
                    <td class="">
                        <router-link :to="{ name: 'costs.edit', params: { id: item.id } }" class="btn btn-primary" style="margin-right: 10px;">
                            {{ $t('global_buttons.edit') }}
                        </router-link>
                        <button @click="deleteCost(item.id)" class="btn btn-primary">
                            {{ $t('global_buttons.delete') }}
                        </button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import useCosts from "../../../composables/costs";
import {onMounted} from "vue";
import moment from 'moment';

export default {
    setup() {
        const {costs, getCosts, destroyCost} = useCosts();

        onMounted(getCosts);

        const deleteCost = async (id) => {
            await destroyCost(id);
            await getCosts();
        }

        return {
            costs,
            deleteCost,
            moment
        }
    }
}
</script>
