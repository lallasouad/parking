<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Add user</h1>
                   <hr />
                   @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                   <p ><a href="{{ route('admin/user') }}" class="btn btn-primary">Go back</a></p>
                   <form action="{{ route('admin/user/save') }}" method="get" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">name</label>
                                <input type="text" name="name" class="form-control" placeholder="name" value="{{$users->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">email</label>
                                <input type="text" name="email" class="form-control" placeholder="email" value="{{$users->email}}">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">password</label>
                                <input type="text" name="password" class="form-control" placeholder="password" value="{{$users->password}}">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">abonnement</label>
                                <input type="text" name="abonnement" class="form-control" placeholder="abonnement" value="{{$users->abonnement}}">
                                @error('abonnement')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    <div class="row">
                    <div class="d-grid">
                        <button class="btn btn-primary">submit</button>
                        </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
