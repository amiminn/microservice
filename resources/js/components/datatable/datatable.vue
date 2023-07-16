<template lang="">
    <DataTable
        buttons-pagination
        :rows-items="intRows"
        :rows-per-page="10"
        :headers="headers"
        :items="items"
        :theme-color="themeColor"
    >
        <template #item-action="{ name }">
            <div class="player-wrapper">
                <router-link :to="name">hapus</router-link>
            </div>
        </template>
    </DataTable>
</template>
<script lang="ts">
import DataTable from "vue3-easy-data-table";
import "vue3-easy-data-table/dist/style.css";
import { defineComponent } from "vue";

export default defineComponent({
    components: { DataTable },
    data() {
        return {
            headers: [],
            items: [],
            intRows: [10, 15, 20],
            themeColor: "#f48225",
        };
    },
    mounted() {
        this.headers = [
            { text: "Name", value: "name", fixed: true },
            { text: "Height (cm)", value: "height" },
            { text: "Weight (kg)", value: "weight" },
            { text: "Age", value: "age", sortable: true },
            { text: "action", value: "action" },
        ];

        this.items = [
            { name: "Curry", height: 178, weight: 77, age: 20 },
            { name: "James", height: 180, weight: 75, age: 21 },
            { name: "Jordan", height: 181, weight: 73, age: 22 },
            { name: "Curry", height: 178, weight: 77, age: 20 },
            { name: "James", height: 180, weight: 75, age: 21 },
            { name: "Jordan", height: 181, weight: 73, age: 22 },
            { name: "Curry", height: 178, weight: 77, age: 20 },
            { name: "James", height: 180, weight: 75, age: 21 },
            { name: "Jordan", height: 181, weight: 73, age: 22 },
            { name: "Curry", height: 178, weight: 77, age: 20 },
            { name: "James", height: 180, weight: 75, age: 21 },
            { name: "Jordan", height: 181, weight: 73, age: 22 },
        ];
    },
});
</script>
<style>
@tailwind components;
@layer components {
    .vue3-easy-data-table {
        @apply !rounded-md p-1  !border-2;
    }
    .pagination__items-index {
        @apply !italic;
    }
    .vue3-easy-data-table__footer {
        @apply justify-center !py-6;
    }
    .pagination__rows-per-page {
        @apply !text-left;
    }
    .show-shadow {
        @apply !shadow !shadow-none;
    }
    .item,
    .button {
        @apply !px-2;
    }
    /* .vue3-easy-data-table__header */
}
</style>
