<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!!__('Pills &raquo Create') !!}
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
                <form action="{{route('pills.store')}}" class="w-full" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="flex mb-3 space-x-4 px-4">
                            <div class="w-1/2">
                                <div class="text-sm">Name Of Pills</div>
                                <div class="text-xl font-bold"> <input value="{{old('name')}}" name="name" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 uppercase" id="grid-last-name" placeholder="Name of Pills" type="text"></div>
                            </div>

                            <div class="w-1/2">
                                <div class="text-sm">User</div>
                                <div class="text-xl font-bold"> <input value="{{old('username')}}" name="username" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 uppercase" id="grid-last-name" placeholder="User" type="text"></div>
                            </div>

                            {{-- <div class="w-1/2">
                                <div class="text-sm">Select User</div>
                                <select name="user_id" id="user_id" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                                    @foreach ($user as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                        <div class="flex mb-3 space-x-4 px-4">
                            <div class="w-1/2">
                                <div class="text-sm">Amount</div>
                                <div class="text-xl font-bold"> <input value="{{old('amount')}}" name="amount" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="Amount" type="text"></div>
                            </div>
                            <div class="w-1/2">
                                <div class="text-sm">Select Type</div>
                                <select name="type" id="type" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                                   <option value="PILLS">PILLS</option>
                                   <option value="ML">ML</option>
                                   <option value="MG">MG</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex mb-3 space-x-4 px-4">
                            <div class="w-1/2">
                                <div class="text-sm">How Many Weeks</div>
                                <div class="text-xl font-bold"> <input value="{{old('howManyWeeks')}}" name="howManyWeeks" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="How many weeks" type="number" min="0">
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="text-sm">How Many Days</div>
                                <div class="text-xl font-bold"> <input value="{{old('howManyDays')}}" name="howManyDays" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="How many days" type="number" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="flex mb-3 space-x-4 px-4">
                            <div class="w-1/2">
                                <div class="text-sm">Medicine Form</div>
                                <select name="medicineForm" id="medicineForm" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                                    <option value="SYRUP">SYRUP</option>
                                    <option value="CAPSULE">CAPSULE</option>
                                    <option value="CREAM">CREAM</option>s
                                    <option value="DROPS">DROPS</option>
                                    <option value="SYRINGE">SYRINGE</option>
                                    <option value="PILL">PILL</option>
                                 </select>
                            </div>
                            <div class="w-1/2">
                                <div class="text-sm">Schedule</div>
                                <div class="text-sm font-bold"> 
                                    <input value="{{old('schedule')}}" name="schedule" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" placeholder="" type="datetime-local"/>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="text-sm">Take It</div>
                                <select name="takeit" class="apprearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                                    <option value="1">DONE</option>
                                    <option value="2">NOT YET</option>
                                 </select>
                            </div>
                        </div>
                            

                        
                        

                    <div class="flex flex-wrap -mx-3 px-4 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Save Pills
                            </button>
                        </div>
                    </div>
                </form>
            {{-- end bagian form --}}
            </div>
        </div>
    </div>

</x-app-layout>
