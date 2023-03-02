<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mitos & Fakta &raquo; {{$item->title}} &raquo; Edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                {{-- bagian error --}}
                @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's something wrong
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
                @endif
            {{-- end bagian error --}}
            {{-- bagian form --}}
                <form action="{{route('mitos-fakta.update', $item->id)}}" class="w-full" method="POST"">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 px-6 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Title
                        </label>
                        <input value="{{old('title') ?? $item->title}}" name="title" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="Title" type="text">
                    </div>

                    <div class="flex flex-wrap -mx-3 px-6 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Mitos
                        </label>
                        <input value="{{old('mitos') ?? $item->mitos}}" name="mitos" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="Mitos" type="text">
                    </div>

                    <div class="flex flex-wrap -mx-3 px-6 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Fakta
                        </label>
                        <input value="{{old('fakta') ?? $item->fakta}}" name="fakta" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="Fakta" type="text">
                    </div>

                    <div class="flex flex-wrap -mx-3 px-4 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Mitos & Fakta
                            </button>
                        </div>
                    </div>
                </form>
            {{-- end bagian form --}}
            </div>
        </div>
    </div>
</x-app-layout>