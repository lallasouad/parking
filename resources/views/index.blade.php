<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div class="bg-zinc-900 text-white min-h-screen flex flex-col justify-center items-center">
    <p class="text-center text-lg mt-8">Thank you for reserving</p>
    <p class="text-center text-2xl font-bold mt-2">Total amount: ${{$ft}}</p>
    <form action="/session" method="get" class="flex justify-center mt-8">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="total" value="<?php echo $ft; ?>">
        <button type="submit" id="checkout-live-button" class="bg-blue-500 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fa fa-money mr-2"></i> Checkout
        </button>
    </form>
</div>
  </body>
</html>