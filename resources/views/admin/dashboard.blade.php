<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You are logged in!') }}
        </h2>
    </x-slot>


    <div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-zinc-900 dark:text-zinc-100">
        
        <p><a href="{{ route('admin/post') }}" class="btn btn-primary">posts</a></p>
        <p>1 posts </p>
        <p><a href="{{ route('admin/reservation') }}" class="btn btn-primary">reservations</a></p>
        <p>10 reservations</p>
        <p><a href="{{ route('admin/ticket') }}" class="btn btn-primary">Tickets</a></p>
        <p>2 tickets </p>

      </div>
    </div>
  </div>
</div>
</x-app-layout>
