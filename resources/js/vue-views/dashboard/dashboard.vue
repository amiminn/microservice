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
                value="3"
                url="kelola-user"
            ></dcard>
            <dcard logo="book.png" text="total client-key" value="7"></dcard>
            <dcard logo="cake.png" text="surprize"></dcard>
            <dcard logo="clock.png" text="19:20 wib"></dcard>
        </div>
        <div class="grid md:lg:grid-cols-2 gap-3">
            <card>chart A</card>
            <card>paay chart B</card>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
