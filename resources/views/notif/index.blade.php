<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Dashboard &raquo; Notification') !!}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{route('notification.create')}}" class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                   + Create Notification
                </a>
                <a href="#" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 ml-3" id="hapus_semua">
                   Empty Notification
                </a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">ID</th>
                        <th class="border px-6 py-4">Title</th>
                        <th class="border px-6 py-4">Body</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($notif as $item)
                        <tr class="text-center">
                            <td class="border px-6 py-4">{{ $item->id }}</td>
                            <td class="border px-6 py-4">{{ $item->title }}</td>
                            <td class="border px-6 py-4">{{ $item->body}}</td>
                            <td class="border px-6 py-4">
                                <a href="#" data-id="{{$item->id}}" data-title="{{$item->title}}" class="delete inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                    Delete
                                </a>  
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
                {{$notif->links()}}
            </div>
        </div>
    </div>
    
    @push('modals')
        <script>
           $(document).on('click', '.delete', function () {
          let id = $(this).data('id');
          let title = $(this).data('title');
          Swal.fire({
              title: 'Are you sure to delete ? ' + title,
              text: "This Mitos Fakta data will be permanently delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                     url: "{{ url('dashboard/notification/')}}" + '/' + id,
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

          $(document).on('click', '#hapus_semua', function () {
            Swal.fire({
              title: 'Are you sure to delete all notification ? ',
              text: "All notification cannot to restore",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                     url: "{{ url('dashboard/delete-all')}}",
                  type: "POST",
                  data: {
                      '_method': 'DELETE',
                      '_token': '{{csrf_token()}}',
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
