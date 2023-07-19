<template lang="">
    <div class="flex items-center">
        <div class="flex items-center ml-3">
            <div>
                <button
                    type="button"
                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                    aria-expanded="false"
                    data-dropdown-toggle="dropdown-user"
                >
                    <span class="sr-only">Open user menu</span>
                    <img
                        class="w-8 h-8 rounded-full"
                        :src="FUser.avatar"
                        alt="user photo"
                    />
                </button>
            </div>
            <div
                class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow mr-5"
                id="dropdown-user"
            >
                <div class="px-4 py-3" role="none">
                    <p class="text-sm text-gray-900" role="none">
                        {{ FUser.name }}
                    </p>
                    <p
                        class="text-sm font-medium text-gray-900 truncate"
                        role="none"
                    >
                        {{ FUser.email }}
                    </p>
                </div>
                <ul role="none">
                    <li v-for="list in lists">
                        <router-link
                            :to="list.path"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem"
                        >
                            {{ list.name }}
                        </router-link>
                    </li>
                    <li>
                        <div
                            @click="logout"
                            class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:rounded-b hover:bg-rose-300"
                            role="menuitem"
                        >
                            Sign out
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            lists: [],
            FUser: {
                name: null,
                email: null,
                avatar: null,
            },
        };
    },
    mounted() {
        this.lists = [
            {
                name: "profile",
                path: "/profile",
            },
        ];
        this.FUser = user;
    },
    methods: {
        logout() {
            if (localStorage.getItem("_x")) {
                localStorage.removeItem("_x");
            } else {
            }

            window.location = "logout";
        },
    },
};
</script>
<style lang=""></style>
