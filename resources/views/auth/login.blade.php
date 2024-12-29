<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!--<link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->

  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>




    <!-- Styles -->
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
    justify-content: center;
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
    justify-content: center;
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
    color: #fff;
    text-decoration: none;
}
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body >
<div class="box">
    <div class="form-container">
    <!-- Session Status -->
    <div class="top-header">
                
                <header>Login</header>
            </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-field bg-transparent">
            <x-input-label  for="email" :value="__('Email')" />
            <x-text-input id="email"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')"  />
        </div>

        <!-- Password -->
        <div class="input-field bg-transparent">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')"  />
     </div>

        <!-- Remember Me -->
         <div class="bottom">
        <div style="display : inline-block" >
            <label for="remember_me" >
                <input id="remember_me" type="checkbox"  name="remember">
                <span >{{ __('Remember me') }}</span>
            </label>
        </div>

        
            @if (Route::has('password.request'))
            <div >
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
    </div>
    </div>
            @endif

            <div class="input-field">
            <x-primary-button  >
                {{ __('Log in') }}
            </x-primary-button>
            </div>
        
    </form>
    </div>
    </div>
</body>
</html>

