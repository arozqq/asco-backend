@php
    use App\Models\{User, Pills, MitosFakta, Document};
@endphp

<div class="p-5 sm:px-10 bg-white border-b border-gray-200">
    <div class="mt-5 text-2xl">
    Halo, {{Auth::user()->name}}
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                <a href="{{route('users.index')}}">Users</a>
                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 m px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{User::count();}}</span>
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('pills.index')}}">Pills</a>
                <span class="bg-orange-100 text-orange-800 text-sm font-medium mr-2 m px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-800">{{Pills::count();}}</span>
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('mitos-fakta.index')}}">Mitos & Fakta</a>
                <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 m px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-800">{{MitosFakta::count();}}</span>
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-l border-gray-200">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('document.index')}}">Document</a>
                <span class="bg-purple-100 text-purple-800 text-sm font-medium mr-2 m px-2.5 py-0.5 rounded dark:bg-purple-200 dark:text-purple-800">{{Document::count();}}</span>
            </div>
        </div>
    </div>

</div>
