<template>
    <div class="base-demo" style="width: 400px">
        <vue-table-dynamic :params="params"></vue-table-dynamic>
    </div>
</template>

<script>
import VueTableDynamic from "vue-table-dynamic";

export default {
    data() {
        return {
            params: {
                data: [
                    ["Cell-1", "Cell-2", "Cell-3"],
                    ["Cell-4", "Cell-5", "Cell-6"],
                    ["Cell-7", "Cell-8", "Cell-9"],
                ],
            },
        };
    },
    components: { VueTableDynamic },
};
</script>
