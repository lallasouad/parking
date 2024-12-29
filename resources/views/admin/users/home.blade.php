<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List users</h1>
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
                                <th>name</th>
                                <th>email</th>
                                <th>password</th>
                                <th>abonnement</th>
                                <th>user id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">{{ $user->password }}</td>
                                <td class="align-middle">{{ $user->abonnement }}</td>
                                <td class="align-middle">{{ $user->user_id }}</td>
                                
                               
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/users/edit', ['id'=>$user->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/users/delete', ['id'=>$user->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">user introuvable</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
