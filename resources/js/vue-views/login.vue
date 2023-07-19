<template lang="">
    <div
        class="min-h-screen grid md:lg:grid-cols-5 grid-cols-1 bg-[url('wave.svg')] bg-no-repeat"
    >
        <div class="col-span-3">
            <div class="hidden md:block p-8 px-28 text-white">
                <card class="">microservice@amiminn</card>
            </div>
        </div>
        <div class="col-span-2">
            <div class="mx-8 text-4xl text-white font-bold font-sans">
                <span>login</span>
            </div>
            <div class="-my-10 min-h-screen grid content-center px-5">
                <form class="space-y-4" @submit.prevent="to_login">
                    <label class="label">username</label>
                    <input
                        class="form-input"
                        type="text"
                        placeholder="username"
                        v-model="form.username"
                    />
                    <label class="label">password</label>
                    <div class="flex">
                        <input
                            class="mr-5 form-input"
                            :type="showPw ? 'text' : 'password'"
                            placeholder="••••••••"
                            v-model="form.password"
                        />
                        <div
                            class="grid content-center justify-items-center -ml-4 w-10"
                        >
                            <vue-feather
                                @click="on"
                                :type="showPw ? 'eye' : 'eye-off'"
                                class="text-gray-600 text-sm cursor-pointer"
                            ></vue-feather>
                        </div>
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
export default {
    data() {
        return {
            form: {
                username: null,
                password: null,
            },
            showPw: false,
        };
    },
    methods: {
        async to_login() {
            try {
                let res = await axios.post("login", this.form);
                toast(res.data.msg);
                window.location = "/dashboard";
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },
        on() {
            this.showPw = !this.showPw;
        },
    },
};
</script>
<style lang=""></style>
