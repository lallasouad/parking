<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit reservation') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit reservation</h1>
                    <hr />
                    <form action="{{ route('admin/reservation/update', $reservations->id) }}" method="POST">
                        @csrf
                        @method('PUT')
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
                                <button class="btn btn-warning">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>