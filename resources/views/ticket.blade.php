<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <!--<link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->

    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script><style >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
            span{
    color: #fff;
    font-size: small;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}
header{
    color: #fff;
    font-size: 30px;
    display: flex;
    margin-left:50px;
    padding: 10px 0 10px 0;
}
.input-field{
    display: flex;
    flex-direction: column;
}
.input-field .input{
    height: 45px;
    width: 87%;
    border: none;
    outline: none;
    border-radius: 30px;
    color: #fff;
    padding: 0 0 0 42px;
    background-color:  rgba(0,0,0,0.5);;
}
i{
    position: relative;
    top: -31px;
    left: 17px;
    color: #fff;
}
::-webkit-input-placeholder{
    color: #fff;
}
.submit{
    border: none;
    border-radius: 30px;
    font-size: 15px;
    height: 45px;
    outline: none;
    width: 100%;
    background: rgba(255,255,255,0.7);
    cursor: pointer;
    transition: .3s;
}
.submit:hover{
    box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
}
        .box{
    display: flex;
    margin-left:360px;
    align-items: center;
    min-height: 90vh;
}

        body {
            background-image: url('park2.jpg');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;
         background-position: center;
           background-attachment: fixed;
            margin: 0;
            padding: 0;
            backdrop-filter: blur(5px);
             height: 100vh;
            position: relative;
        }
        .bottom{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    font-size: small;
    color: #fff;
    margin-top: 10px;
}
        .form-container {
            width: 350px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px;
        }
        .left{
    display: flex;
}
label a{
    color: white;
    text-decoration: none;
}
    input{
        width: 500px;
    padding: 10px;
    margin-bottom: 10px;
    height: 50px;
    border-radius:7px;
    border: 1px solid blue; 
    }
    textarea{
        width: 500px;
    padding: 10px;
    margin-bottom: 10px;
    height: 50px;
    border-radius:7px;
    border: 1px solid blue; 
    }
    label{
        display:block;
        margin-bottom:5px;
        font-size: 16px;
        color: white;
       
    }
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@include('layouts.navigation')

<!-- Page Heading -->
@if (isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
@endif


<div class="box">
    <div class="form-container">
    <!-- Session Status -->
    <div class="top-header">
                
                <header class="font-weight-normal " style="width:500px;--tw-text-opacity: 1; color:white;">write your problem here:</header>
            </div>
<form action="/helpserv" method="get">
  <label   class="text-lg text-primary" style="--tw-text-opacity: 1; color:white; " for="fname"> name:</label>
  <input style="border-radius: 6px;" type="text" id="fname" name="fname" class="input-field"><br>
  <label  class="text-lg  text-primary" for="lname"style="--tw-text-opacity: 1; color:white; ">subject:</label>
  <input style="border-radius: 6px;" type="text" id="subject" name="subject" class="input-field"><br>
  <label   class="text-lg text-primary" for="message" style="--tw-text-opacity: 1; color:white;">message:</label>
  <textarea style="border-radius: 6px;" type="text" id="message" name="message"  class="input-field "></textarea><br>
  <button type="submit" style=" border-radius:7px; background-color:#007bff;height: 50px; width:500px;
        border: 1px solid black;color:white; ">submit</button>
</form>
</div>
</div>
</body>
</html>