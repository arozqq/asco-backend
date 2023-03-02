<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Dashboard &raquo; Users') !!}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{route('users.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                   + Create User
                </a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">ID</th>
                        <th class="border px-6 py-4">Name</th>
                        <th class="border px-6 py-4">Roles</th> 
                        <th class="border px-6 py-4">Email</th>
                        <th class="border px-6 py-4">Image</th>
                        {{-- <th class="border px-6 py-4">IMEI</th> --}}
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $item)
                            <tr class="text-center">
                                <td class="border px-6 py-4">{{ $item->id }}</td>
                                <td class="border px-6 py-4 ">{{ $item->name }}</td>
                                <td class="border px-6 py-4">{{ $item->role }}</td>
                                <td class="border px-6 py-4">{{ $item->email }}</td>
                                <td class="border px-6 py-4">
                                    @if ($item->profile_photo_path === NULL)
                                    <img src="/image/user/user-default.png" width="100px">
                                    @else
                                    <img src="/image/user/{{ $item->profile_photo_path }}" width="100px">
                                    @endif
                                </td>
                                {{-- <td class="border px-6 py-4">{{ $item->IMEI }}</td> --}}
                                <td class="border px-6 py-4 text-center">
                                    <a href="{{ route('users.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Edit
                                    </a>
                                    <a href="#" data-id="{{$item->id}}" data-nama="{{$item->name}}" class="delete inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Delete
                                    </a>
                                 
                                    <!-- <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="inline-block">-->
                                    <!--    {!! method_field('delete') . csrf_field() !!}-->
                                    <!--    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">-->
                                    <!--        Delete-->
                                    <!--    </button>-->
                                    <!--</form>-->
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="6" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{$users->links()}}
            </div>
        </div>
    </div>
    
    @push('modals')
        <script>
           $(document).on('click', '.delete', function () {
          let id = $(this).data('id');
          let nama = $(this).data('nama');
          Swal.fire({
              title: 'Are you sure to delete ? ' + nama,
              text: "This User data will be permanently delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    
                    url: "{{ url('dashboard/users/')}}" + '/' + id,
                  type: "POST",
                  data: {
                      '_method': 'DELETE',
                      '_token': '{{csrf_token()}}',
                      'id': id,
                  },
                  dataType:"JSON",
                  success: function(response) {
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    Response(response);
                    }
                  })
              }
            })
          });
 
        </script>
    @endpush
</x-app-layout>
