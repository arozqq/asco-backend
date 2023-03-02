<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Dashboard &raquo; Video') !!}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{route('video.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                   + Upload Video
                </a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">ID</th>
                        <th class="border px-6 py-4">Title</th>
                        <th class="border px-6 py-4">Link</th>
                        <th class="border px-6 py-4">Creator</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($video as $item)
                        <tr class="text-center">
                            <td class="border px-6 py-4">{{ $item->id }}</td>
                            <td class="border px-6 py-4">{{ $item->title }}</td>
                            <td class="border px-6 py-4">
                                @php
                                    $converted_url = str_replace("watch?v=", "embed/", $item->link)
                                @endphp
                                <iframe src="{{$converted_url}}" frameborder="0" width="420" height="315" class="mx-auto rounded"></iframe>
                                {{$item->link}}
                            </td>
                            <td class="border px-6 py-4">{{ $item->uploader }}</td>
                            <td class="border px-6 py-4">
                                <a href="{{ route('video.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                    Edit
                                </a>
                                <a href="#" data-id="{{$item->id}}" data-nama="{{$item->title}}" class="delete inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">
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
                {{$video->links()}}
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
              text: "This Video data will be permanently delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                   url: "{{ url('dashboard/video/')}}" + '/' + id,
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
