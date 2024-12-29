<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin reservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List reservation</h1>
                        <a href="{{ route('admin/reservation/create') }}" class="btn btn-primary">Add reservation</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>place id</th>
                                <th>from</th>
                                <th>to</th>
                                <th>car type</th>
                                <th>user id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reservations as $reservation)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $reservation->place_id }}</td>
                                <td class="align-middle">{{ $reservation->from }}</td>
                                <td class="align-middle">{{ $reservation->to }}</td>
                                <td class="align-middle">{{ $reservation->car_type }}</td>
                                <td class="align-middle">{{ $reservation->user_id }}</td>
                               
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/reservation/edit', ['id'=>$reservation->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/reservation/delete', ['id'=>$reservation->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">reservation introuvable</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
