<template lang="">
    <div>
        <card>
            <namepage>
                <div class="flex">
                    <img
                        src="/assets/icons/planet.png"
                        width="37"
                        class="mr-3"
                        alt="planet"
                    />
                    <div>Dahsboard</div>
                </div>
            </namepage>
        </card>
        <div class="grid grid-cols-2 md:lg:grid-cols-4 gap-3">
            <dcard
                logo="users.png"
                text="total user"
                :value="userCount"
                url="kelola-user"
            ></dcard>
            <dcard
                logo="book.png"
                text="total key"
                :value="clientCount"
                url="client"
            ></dcard>
            <dcard logo="cake.png" text="surprize"></dcard>
            <dcard logo="clock.png" :text="time"></dcard>
        </div>
        <div class="grid md:lg:grid-cols-2 gap-3">
            <card>chart A</card>
            <card>paay chart B</card>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            userCount: 0,
            clientCount: 0,
            time: "00:00 wib",
        };
    },

    methods: {
        async getDataDashboard() {
            let res = await axios.get("api/dashboard");
            this.userCount = res.data.userCount;
            this.clientCount = res.data.clientCount;
        },

        timer() {
            let d = new Date();
            this.time = d.getHours() + ":" + d.getMinutes() + " wib";
        },
    },

    mounted() {
        this.getDataDashboard();
        this.timer();
        setInterval(() => {
            this.timer();
        }, 10000);
    },
};
</script>
<style lang=""></style>
