<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

   <style class="">
    .like-icon {
      margin-top:3px;
    font-size: 14px; /* Adjust size as needed */
    color: #007bff; /* Blue color similar to btn-info */
    cursor: pointer; /* Show pointer cursor on hover */
}

.like-icon:hover {
    color: #0056b3; /* Darker blue on hover */
}
.dislike-icon {
      margin-top:3px;
    font-size: 14px; /* Adjust size as needed */
    color: #007bff; /* Blue color similar to btn-info */
    cursor: pointer; /* Show pointer cursor on hover */
}

.dislike-icon:hover {
    color: #0056b3; /* Darker blue on hover */
}


   </style>

  </head>

  @include('layouts.navigation')

<!-- Page Heading -->
@if (isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
@endif

  <body style="background-color:white;">
    <div class="b dark:bg-zinc-800 p-4 md:p-8 mx-auto max-w-screen-lg text-black dark:text-white">
    <div class="feedback-form">
        <p class="text-blue-500 text-lg">@lang('messages.feedback')</p>
        <form action="/create-post" method="post" class="flex flex-col md:flex-row gap-4 items-start">
            @csrf
            <textarea name="title" type="text" placeholder="@lang('messages.Title')" class="w-full md:w-96 p-2 border border-blue-500 rounded-md mb-4 dark:text-white dark:bg-zinc-700"></textarea>
            <textarea name="body" placeholder="@lang('messages.Body content...')" class="w-full md:w-96 p-2 border border-blue-500 rounded-md mb-4 dark:text-white dark:bg-zinc-700"></textarea>
            <button type="submit" class="w-full md:w-36 h-12 bg-blue-500 text-white rounded-md hover:bg-blue-700">@lang('messages.createpost')</button>
        </form>
    </div>
    <div class="youtube-comments">
        <h2 class="text-blue-500 text-2xl md:text-3xl">@lang('messages.feed')</h2>
        <div class="youtube-comment text-xs md:text-sm">
            <div class="bg-white dark:bg-zinc-700 p-1 md:p-2 rounded-lg shadow-md mt-2">
                @foreach($posts as $post)
                    <div class="mt-4">
                        <h3 class="text-lg md:text-xl">Zineb</h3>
                        <h3 class="text-lg md:text-xl">{{$post['title']}}</h3>
                        <p class="mt-2 text-sm md:text-base">{{$post['body']}}</p>
                        <div class="flex justify-end">
                        
                   
    
         <a href="/edit-post/{{$post->id}}" class="text-blue-500 hover:underline mr-4">@lang('messages.Edit')</a>
                            <form action="/delete-post/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">@lang('messages.Delete')</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

  </body>
 

</html>
