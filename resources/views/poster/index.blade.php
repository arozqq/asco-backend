<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Dashboard &raquo; Poster') !!}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{route('poster.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                   + Upload Poster
                </a>
            </div>
            <div class="bg-white ovaerflow-auto">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">ID</th>
                        <th class="border px-6 py-4">Title</th>
                        <th class="border px-6 py-4">Poster</th>
                        <th class="border px-6 py-4">Creator</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($poster as $item)
                        <tr class="text-center">
                            <td class="border px-6 py-4">{{ $item->id }}</td>
                            <td class="border px-6 py-4">{{ $item->title }}</td>
                            <td class="border px-6 py-4"><img src="/poster/{{ $item->poster_image }}" width="200" alt="" class="rounded center"></td>
                            <td class="border px-6 py-4">{{ $item->creator }}</td>
                            <td class="border px-6 py-4">
                                <a href="{{route('download-poster', $item->uuid)}}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                    Download
                                </a>
                                <a href="{{ route('poster.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
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
                {{$poster->links()}}
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
              text: "This Poster data will be permanently delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                   url: "{{ url('dashboard/poster/')}}" + '/' + id,
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
