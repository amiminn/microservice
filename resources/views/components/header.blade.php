@php
$pages = [
[
"name"=>"profile",
"path"=>"/profile",
]
];
@endphp

<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <vue-feather type="align-left"></vue-feather>
                </button>
                <div class="flex ml-2 md:mr-24">
                    <div class="h-8 mr-3 text-2xl">🌱</div>
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">{{
                        env("APP_NAME")}}</span>
                </div>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 "
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ asset("default.jpg")}}" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow mr-5"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900" role="none">
                                ilham desu.
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate " role="none">
                                ilhamdesu@amiminn.com
                            </p>
                        </div>
                        <ul role="none">
                            @foreach ($pages as $data)
                            <li>
                                <router-link to="{{ $data["path"] }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{
                                    $data["name"]}}</router-link>
                            </li>
                            @endforeach
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:rounded-b hover:bg-rose-300"
                                    role="menuitem">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>