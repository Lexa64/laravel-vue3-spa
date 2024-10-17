<template>
    <div class="">
        <div class="">
            <div class="">
                <router-link :to="{ name: 'estimates.create' }" class="btn btn-primary" style="margin-bottom: 10px;">{{ $t('cost_estimates.create') }}</router-link>
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
                        {{ $t('cost_estimates.ce_1_indicator') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('cost_estimates.ce_1_total_costs') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('cost_estimates.updated_at') }}
                    </span>
                </th>
                <th class="">
                </th>
            </tr>
            </thead>

            <tbody class="">
            <template v-for="item in estimates" :key="item.id">
                <tr class="">
                    <td class="">
                        {{ item.id }}
                    </td>
                    <td class="">
                        {{ item.ce_1_indicator }}
                    </td>
                    <td class="">
                        {{ item.ce_1_total_costs }}
                    </td>
                    <td class="">
                        {{ moment(item.updated_at).format('YYYY-MM-DD') }}
                    </td>
                    <td class="">
                        <router-link :to="{ name: 'estimates.edit', params: { id: item.id } }" class="btn btn-primary" style="margin-right: 10px;">
                            {{ $t('global_buttons.edit') }}
                        </router-link>
                        <button @click="deleteEstimate(item.id)" class="btn btn-primary">
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
import useEstimates from "../../../composables/estimates";
import {onMounted} from "vue";
import moment from 'moment';

export default {
    setup() {
        const {estimates, getEstimates, destroyEstimate} = useEstimates();

        onMounted(getEstimates);

        const deleteEstimate = async (id) => {
            await destroyEstimate(id);
            await getEstimates();
        }

        return {
            estimates,
            deleteEstimate,
            moment
        }
    }
}
</script>
