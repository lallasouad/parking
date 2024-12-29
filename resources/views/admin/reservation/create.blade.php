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
                    <h1 class="mb-0">Add reservation</h1>
                   <hr />
                   @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                   <p ><a href="{{ route('admin/reservation') }}" class="btn btn-primary">Go back</a></p>
                   <form action="{{ route('admin/reservation/save') }}" method="get" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">place id</label>
                                <input type="text" name="place_id" class="form-control" placeholder="place id" value="{{$reservations->place_id}}">
                                @error('place_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">from</label>
                                <input type="text" name="from" class="form-control" placeholder="from" value="{{$reservations->from}}">
                                @error('from')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">to</label>
                                <input type="text" name="to" class="form-control" placeholder="to" value="{{$reservations->to}}">
                                @error('to')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">car type</label>
                                <input type="text" name="car_type" class="form-control" placeholder="car type" value="{{$reservations->car_type}}">
                                @error('car_type')
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
