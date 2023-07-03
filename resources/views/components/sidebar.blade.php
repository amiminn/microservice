@php
$pages = [
[
"name"=>"Dashboard",
" path"=>"/",
" icon"=>"command",
"sp"=>"new",
],
[
"name"=>"About",
" path"=>"/about",
" icon"=>"cloud-rain",
"sp"=>"",
],
];
@endphp
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 "
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
        <ul class="space-y-2 font-medium">
            @foreach ($pages as $d)
            <li>
                <router-link to="{{$d[" path"]}}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <i data-feather="{{$d[" icon"]}}" class=" text-gray-500 "></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{$d["name"]}}</span>
                    @if ($d["sp"] != null)
                    <span
                        class="inline-flex items-center justify-center w-3 h-3 px-5 py-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-lg">{{$d["sp"]}}</span>
                    @endif
                </router-link>
            </li>
            @endforeach
        </ul>
    </div>
</aside>