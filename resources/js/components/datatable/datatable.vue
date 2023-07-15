<template lang="">
    <div class="grid gap-4">
        <div class="overflow-x-auto sm:rounded">
            <div class="grid grid-cols-2 mb-3">
                <select class="form-input lg:!w-1/4 md:!w-1/3 sm:!w-1/4">
                    <template v-for="(val, id) in valpage">
                        <option value="{{ valpage[id] }}">
                            {{ valpage[id] }}
                        </option>
                    </template>
                </select>
            </div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3" v-for="(item, id) in datarow">
                            {{ datarow[id] }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(item, index) in datacols"
                        class="bg-white border-b hover:bg-gray-50"
                    >
                        <th class="font-medium text-gray-900 whitespace-nowrap">
                            {{ item.produk_name }}
                        </th>
                        <td>{{ item.color }}</td>
                        <td>{{ item.category }}</td>
                        <td>{{ item.price }}</td>
                        <td class="text-right">
                            <a
                                href="#"
                                class="font-medium text-blue-600 hover:underline"
                                >Edit</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <nav class="flex justify-end">
            <ul class="flex items-center -space-x-px h-8">
                <li>
                    <a class="li-paginate rounded-l">
                        <vue-feather type="chevron-left"></vue-feather>
                    </a>
                </li>
                <li>
                    <a class="li-paginate">...</a>
                </li>
                <li>
                    <a class="li-paginate">12</a>
                </li>
                <li>
                    <a class="li-paginate">13</a>
                </li>
                <li>
                    <a class="li-paginate paginate-active">14</a>
                </li>
                <li>
                    <a class="li-paginate">...</a>
                </li>
                <li>
                    <a class="li-paginate rounded-r">
                        <vue-feather type="chevron-right"></vue-feather>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
export default {
    data() {
        return {
            valpage: [5, 10, 20, 25],
            datarow: [],
            datacols: [],
        };
    },
    mounted() {
        this.datarow = ["Product name", "color", "kategory", "price", " "];
        this.datacols = [
            {
                produk_name: "Apple MacBook Pro 17 inc",
                color: "silver",
                category: "laptop",
                price: "$2999",
            },
        ];
    },
};
</script>
<style lang=""></style>
