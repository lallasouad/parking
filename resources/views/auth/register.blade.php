<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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
        .form-container {
            width: 350px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px;
        }
        label a{
    color: #fff;
    text-decoration: none;
}
    </style>
    <script>
        function showCartype() {
            const abonnementTypeValue = document.querySelector('input[name="abonnement"]:checked');
            const container = document.getElementById('cartypeContainer');
            container.innerHTML = '';

            if (abonnementTypeValue && abonnementTypeValue.value === 'oui') {
                const carSelect = document.createElement('select');
                carSelect.id = 'car_type';
                carSelect.name = 'car_type';

                const option1 = document.createElement('option');
                option1.value = 'small';
                option1.textContent = 'Small';
                carSelect.appendChild(option1);

                const option2 = document.createElement('option');
                option2.value = 'big';
                option2.textContent = 'Big';
                carSelect.appendChild(option2);

                container.appendChild(carSelect);

                // Call showPlaces initially to populate places based on default car type
                showPlaces(carSelect.value);

                // Attach event listener to car type select
                carSelect.addEventListener('change', function() {
                    const carTypeValue = this.value;
                    showPlaces(carTypeValue);
                });

                // Show places container initially
                const placeContainer = document.getElementById('placeContainer');
                placeContainer.style.display = 'block';
            } else {
                // Hide places container if "Non" is selected or nothing is selected
                const placeContainer = document.getElementById('placeContainer');
                placeContainer.innerHTML = ''; // Clear previous content
                placeContainer.style.display = 'none';
            }
        }

        function showPlaces(carTypeValue) {
            const container = document.getElementById('placeContainer');
            container.innerHTML = ''; // Clear previous content

            // Define places data based on the selected car type
            let placesData = [];

            if (carTypeValue === 'small') {
                placesData = [
                    { id: '1', name: 'Place 1' },
                    { id: '2', name: 'Place 2' },
                    { id: '3', name: 'Place 3' },
                    { id: '4', name: 'Place 4' },
                    { id: '5', name: 'Place 5' },
                    { id: '6', name: 'Place 6' },
                    { id: '7', name: 'Place 7' },
                    { id: '8', name: 'Place 8' },
                    { id: '9', name: 'Place 9' },
                    { id: '10', name: 'Place 10' },
                ];
            } else if (carTypeValue === 'big') {
                placesData = [
                    { id: '11', name: 'Place 11' },
                    { id: '12', name: 'Place 12' },
                    { id: '13', name: 'Place 13' },
                    { id: '14', name: 'Place 14' },
                    { id: '15', name: 'Place 15' },
                    { id: '16', name: 'Place 16' },
                    { id: '17', name: 'Place 17' },
                    { id: '18', name: 'Place 18' },
                    { id: '19', name: 'Place 19' },
                    { id: '20', name: 'Place 20' },
                ];
            }

            // Create select element for places
            const placeSelect = document.createElement('select');
            placeSelect.id = 'place';
            placeSelect.name = 'place_id';

            // Add options based on the defined places data
            placesData.forEach(place => {
                const option = document.createElement('option');
                option.value = place.id;
                option.textContent = place.name;
                placeSelect.appendChild(option);
            });

            container.appendChild(placeSelect);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const abonnementInputs = document.querySelectorAll('input[name="abonnement"]');
            abonnementInputs.forEach(function(input) {
                input.addEventListener('change', showCartype);
            });

            showCartype();
        });
    </script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="box">
    <div class="form-container">
        <div class="top-header">
            <header>Register</header>
        </div>
        <div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Abonnement -->
                <div class="mt-4 input-field">
                    <x-input-label for="abonnement" :value="__('Abonnement')" />
                    <div class="flex items-center mt-2">
                        <input type="radio" id="oui" name="abonnement" value="oui" class="mr-2" required>
                        <label for="oui" class="mr-4">Oui</label>
                        <input type="radio" id="non" name="abonnement" style="margin-left: 7px;" value="non" class="mr-2" required>
                        <label for="non">Non</label>
                    </div>
                    <x-input-error :messages="$errors->get('abonnement')" class="mt-2" />
                </div>

                <!-- Car Type Container -->
                <div style="margin-top: 7px;" id="cartypeContainer"></div>

                <!-- Place Container -->
                <div style="margin-top: 10px; display: none;" id="placeContainer"></div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Registration Button -->
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="ms-4" style="background-color: blue;">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>