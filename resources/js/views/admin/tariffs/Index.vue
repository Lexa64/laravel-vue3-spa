<template>
    <div class="">
        <div class="">
            <div class="">
                <router-link :to="{ name: 'tariffs.create' }" class="btn btn-primary" style="margin-bottom: 10px;">{{ $t('utility_tariffs.create') }}</router-link>
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
                        {{ $t('utility_tariffs.year') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('utility_tariffs.decree_number') }}
                    </span>
                </th>
                <th class="">
                    <span class="">
                        {{ $t('utility_tariffs.created_at') }}
                    </span>
                </th>
                <th class="">
                </th>
            </tr>
            </thead>

            <tbody class="">
            <template v-for="item in tariffs" :key="item.id">
                <tr class="">
                    <td class="">
                        {{ item.id }}
                    </td>
                    <td class="">
                        {{ item.year }}
                    </td>
                    <td class="">
                        {{ item.decree_number }}
                    </td>
                    <td class="">
                        {{ moment(item.created_at).format('YYYY-MM-DD') }}
                    </td>
                    <td class="">
                        <router-link :to="{ name: 'tariffs.edit', params: { id: item.id } }"
                                     class="btn btn-primary"
                                     style="margin-right: 10px;">
                            {{ $t('global_buttons.edit') }}
                        </router-link>
                        <button @click="deleteTariff(item.id)" class="btn btn-primary">
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
import useTariffs from "../../../composables/tariffs";
import {onMounted} from "vue";
import moment from 'moment';

export default {
    setup() {
        const {tariffs, getTariffs, destroyTariff} = useTariffs();

        onMounted(getTariffs);

        const deleteTariff = async (id) => {
            await destroyTariff(id);
            await getTariffs();
        }

        return {
            tariffs,
            deleteTariff,
            moment
        }
    }
}
</script>
