<template lang="">
    <section x-data="login" class="px-4 py-24 mx-auto max-w-7xl">
        <div
            class="w-full mx-auto space-y-5 sm:w-8/12 md:w-6/12 lg:w-4/12 xl:w-3/12"
        >
            <h1 class="text-4xl font-semibold text-center text-gray-900">
                Login
            </h1>
            <div class="pb-6 space-y-2 border-b border-gray-200"></div>
            <form class="space-y-4" @submit.prevent="to_login">
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700"
                        >Your Username</span
                    >
                    <input
                        class="form-input"
                        type="text"
                        placeholder="username"
                        v-model="form.username"
                    />
                </label>
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700"
                        >Your Password</span
                    >
                    <input
                        class="form-input"
                        type="password"
                        placeholder="••••••••"
                        v-model="form.password"
                    />
                </label>
                <input
                    type="submit"
                    class="w-full cursor-pointer py-3 btn btn-primary"
                    value="masuk"
                />
            </form>
        </div>
    </section>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            form: {
                username: null,
                password: null,
            },
        };
    },
    methods: {
        async to_login() {
            try {
                let res = await axios.post("login", this.form);
                toast(res.data.msg);
                window.location = "/";
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },
    },
};
</script>
<style lang=""></style>
