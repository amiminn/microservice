<template lang="">
    <div
        class="min-h-screen grid sm:lg:grid-cols-5 grid-cols-1 bg-wave bg-no-repeat"
    >
        <div class="hidden sm:block col-span-3">
            <div class="p-8 px-28 text-white">
                <div class="card !bg-transparent">
                    <div class="card-body">microservice@amiminn</div>
                </div>
            </div>
        </div>
        <div class="col-span-2 grid content-around">
            <div class="mx-8 text-4xl text-white font-bold font-sans">
                <span>login</span>
            </div>
            <div class="px-5">
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
                    <button type="submit" class="py-3 btn btn-dark btn-block">
                        login
                    </button>
                </form>
            </div>
            <div></div>
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
