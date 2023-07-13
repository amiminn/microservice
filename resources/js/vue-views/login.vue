<template lang="">
    <div
        class="min-h-screen grid md:max-xl:grid-cols-5 grid-cols-1 bg-[url('wave.svg')] bg-no-repeat"
    >
        <div class="col-span-3">
            <div class="hidden md:block p-8 text-white">
                <card class="">microservice @amiminn</card>
            </div>
        </div>
        <div class="col-span-2">
            <div class="mx-8 mt-4 text-4xl text-white font-bold font-sans">
                login
            </div>
            <div class="-my-8 min-h-screen grid content-center px-5">
                <form class="space-y-4" @submit.prevent="to_login">
                    <label class="label">username</label>
                    <input
                        class="form-input"
                        type="text"
                        placeholder="username"
                        v-model="form.username"
                    />
                    <label class="label">password</label>
                    <div class="relative cursor-pointer">
                        <div class="header-icon">
                            <vue-feather type="eye-off"></vue-feather>
                        </div>
                        <input
                            class="form-icon"
                            type="password"
                            placeholder="••••••••"
                            v-model="form.password"
                        />
                    </div>
                    <button
                        type="submit"
                        class="py-3 btn btn-primary btn-block"
                    >
                        login
                    </button>
                </form>
            </div>
        </div>
    </div>
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
                // console.log(res);
                window.location = "/";
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },
    },
};
</script>
<style lang=""></style>
