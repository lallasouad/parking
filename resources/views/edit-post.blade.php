<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div class="bg-white dark:bg-zinc-800 p-4 md:p-8 mx-auto max-w-screen-lg text-black dark:text-white">
    <h1 class="text-blue-500 text-2xl md:text-3xl">@lang('messages.editpost')</h1>
    <form action="/edit-post/{{$post->id}}" method="POST" class="flex flex-col gap-4 items-start">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$post->title}}" class="w-full md:w-96 p-2 border border-blue-500 rounded-md mb-4 dark:text-white dark:bg-zinc-700">
        <textarea name="body" class="w-full md:w-96 p-2 border border-blue-500 rounded-md mb-4 dark:text-white dark:bg-zinc-700">{{$post->body}}</textarea>
        <button type="submit" class="w-full md:w-36 h-12 bg-blue-500 text-white rounded-md hover:bg-blue-700">savechanges</button>
    </form>
</div>
  </body>
</html>