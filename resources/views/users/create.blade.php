<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!!__('User &raquo Create') !!}
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
                <form action="{{route('users.store')}}" class="w-full" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6 px-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Name
                        </label>
                        <input value="{{old('name')}}" name="name" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="Name" type="text">
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6 px-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Email
                        </label>
                        <input value="{{old('email')}}" name="email" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="Email" type="text">
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6 px-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Image
                        </label>
                        <input value="{{old('profile_photo_path')}}" name="profile_photo_path" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="Image" type="file">
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6 px-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Password
                        </label>
                        <input value="{{old('password')}}" name="password" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="Password" type="password">
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6 px-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Password Confirmation
                        </label>
                        <input value="{{old('password_confirmation')}}" name="password_confirmation" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="Password Confirmation" type="password">
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6 px-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                           Role
                        </label>
                        <select name="role" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                            <option value="USER">USER</option>
                            <option value="ADMIN">ADMIN</option>
                        </select>  
                    </div>

                    {{-- <div class="flex flex-wrap -mx-3 mb-6 px-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            IMEI
                        </label>
                        <input value="{{old('IMEI')}}" name="IMEI" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="IMEI" type="text">
                    </div> --}}

                 
                    <div class="flex flex-wrap -mx-3 mb-6 px-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Save User
                            </button>
                        </div>
                    </div>
                </form>
            {{-- end bagian form --}}
            </div>
        </div>
    </div>
</x-app-layout>
