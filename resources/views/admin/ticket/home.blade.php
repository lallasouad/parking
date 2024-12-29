<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">tickets</h1>                    
                    </div>
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>subject</th>
                                <th>message</th>
                                <th>statut</th>
                                <th>user</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tickets as $ticket)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $ticket->fname }}</td>
                                <td class="align-middle">{{ $ticket->subject }}</td>
                                <td class="align-middle">{{ $ticket->message }}</td>
                                <td class="align-middle">{{ $ticket->status }}</td>
                                <td class="align-middle">{{ $ticket->user_id }}</td>
                               
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/ticket/delete', ['id'=>$ticket->id]) }}" type="button" class="btn btn-secondary">open</a>
                                      
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">ticket introuvable</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
