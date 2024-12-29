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
                    <h1 class="mb-0">Add post</h1>
                   <hr />
                   @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                   <p ><a href="{{ route('admin/post') }}" class="btn btn-primary">Go back</a></p>
                   <form action="{{ route('admin/post/save') }}" method="get" enctype="multipart/form-data">
                    @csrf 
                    <div class="row mb-3">
                        <div class="col">
                         <input type="text" name="title" class="form-control" placeholder="title">
                         @error('title')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                         <input type="text" name="body" class="form-control" placeholder="body">
                         @error('body')
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
