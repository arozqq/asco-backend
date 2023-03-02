<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Dashboard &raquo; Pills') !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="not-prose max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{route('pills.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                   + Add Pills
                </a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full border-collapse text-sm">
                    <thead>
                    <tr class="">
                        <th class="border px-6 py-4 ">ID</th>
                        <th class="border px-6 py-4">Name of Pills</th>
                        <th class="border px-6 py-4">User</th>
                        <th class="border px-6 py-4">Amount</th>
                        <th class="border px-6 py-4">Type</th>
                        <th class="border px-6 py-4">How Many Weeks</th>
                        <th class="border px-6 py-4">How Many Days</th>
                        <th class="border px-6 py-4">Medicine Form</th>
                        <th class="border px-6 py-4">Schedule</th>
                        <th class="border px-8 py-4">Take It</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($pills as $item)
                        <tr class="text-center">
                            <td class="border px-6 py-4">{{ $item->id }}</td>
                            <td class="border px-6 py-4">{{ $item->name }}</td>
                            <td class="border px-6 py-4">{{ $item->username }}</td>
                            {{-- <td class="border px-6 py-4">{{ $item->user->name }}</td> --}}
                            <td class="border px-6 py-4">{{ $item->amount }}</td>
                            <td class="border px-6 py-4">{{ $item->type }}</td>
                            <td class="border px-6 py-4">{{ $item->howManyWeeks }}</td>
                            <td class="border px-6 py-4">{{ $item->howManyDays }}</td>
                            <td class="border px-6 py-4">{{ $item->medicineForm }}</td>
                            {{-- diffForHumans() --}}
                            <td class="border px-6 py-4">{{ \Carbon\Carbon::parse($item->schedule)->diffForHumans() }}</td>
                            <td class="border px-6 py-4">{{ $item->takeit === 1  ? "Done" : "Not Yet" }}</td>
                            <td class="border px-6 py-4">
                                <a href="{{ route('pills.edit', $item->id) }}" class=" mb-2 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                    Edit
                                </a>
                                <a href="#" data-id="{{$item->id}}" data-nama="{{$item->name}}" class="delete inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Delete
                                </a> 
                            </tr>    
                            @empty
                            <tr>
                                <td colspan="12" class="border text-center p-5">
                                    Data Tidak Ditemukan
                                </td>
                             </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{$pills->links()}}
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
              text: "This Pills data will be permanently delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                 url: "{{ url('dashboard/pills/')}}" + '/' + id,
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
