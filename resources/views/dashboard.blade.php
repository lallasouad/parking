
<!DOCTYPE html>
<html>
<head><style >


   /* .feedback-form{
      margin-left: 40px;
      margin-top: 20px;
      height: 150px;
    
    }
    .post-container{
        margin-left: 40px;
      margin-top: 20px;
    }
    .all{
        margin-left: 40px;
      margin-top: 20px;
    }

    textarea{
      width:300px;
      height: 50px;
      
      display:inline-block;
      margin-top:20px;
      border-radius:7px;
    }
    .textar{
      
      width:300px;
      height: 50px;
      margin-left:40px;
      display:inline-block;
      margin-top:20px;
      border-radius:7px;
    }
    .tar{
      width:300px;
      height: 50px;
      
      display:inline-block;
      margin-top:20px;
      border-radius:7px;
    }*/
    .post-container {
    background-color: white;
    padding: 10px;
    margin-bottom: 10px;
    margin-left: 45px;
    height:75px;
    width: 880px;
}

.post-title {
    color: #333;
}

.post-body {
    color: #666;
}

/* For feedback form */
.feedback-form {
    margin-bottom: 20px;
    margin-left: 50px;
    margin-top:20px;
}
.feedback-form p{
  margin-left: 10px;
  font-size: 20px;
  margin-bottom: 10px;
 
}

.feedback-form input,
.feedback-form textarea {
    width: 300px;
    padding: 10px;
    margin-bottom: 10px;
    height: 50px;
    border-radius:7px;
    border: 1px solid blue; 

}

.feedback-form button {
  box-sizing: border-box;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
   
    top: 39,5%;
}

.feedback-form button:hover {
    background-color: #0056b3;
} 
#map {
  width:95%;
          height: 320px;
          margin-top:50px;
          margin-left:10px;
        }
   
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
 
</head>
<x-app-layout>

<body style="background-color:white;margin-top:5px;">

<div class="box" style=" justify-content: center;background-color:white;">         
<div class="feedback-form" >
<div class="top-header">
    
  <p style="margin-left:450px;margin-top:10px;" class="text-primary">@lang('messages.Reserver')</p>
  </div>

  <form action="/create-reservation" method="get">
        @csrf
        <div class="container">
        <div class="row">
        <div class="col-sm">
            <p style="margin-left:50px;"class="text-primary">Choose your car type:</p>
            <select style="border-radius:2px;margin-left:50px;"name="car_type" id="car_type">
                <option value="small">@lang('messages.small')</option>
                <option value="big">@lang('messages.big')</option>
            </select>
        </div>
        <div class="col-sm">
        <p style="margin-left:20px; " class="text-primary">Choose a place:</p>
        <div style="margin-top: 15px;margin-bottom: 15px;margin-left:22px;" id="cartypeContainer"></div>
        </div>
        </div>
        </div>
        <div class="container">
        <div class="row">
          <div class="col-sm">
            <label for="from">@lang('messages.From'):</label>
            <input type="time" id="from" name="from" class="p-2 border rounded-lg" min="00:00" max="22:00">
       
        </div>
        <div  class="col-sm">
            <label for="to">@lang('messages.To')</label>
            <input type="time" id="to" name="to" class="p-2 border rounded-lg">
        </div>
        </div>
        </div>
        @if($errors->has('to'))
        <div class="alert alert-danger">{{ $errors->first('to') }}</div>
        @endif
        <button type="submit" style="margin-left:70px; border-radius:7px;height: 50px; width:150px; margin-bottom:10px; border: 1px solid black;color:white;"class="bg-primary">@lang('messages.Create_reservation')</button>
    </form>
 </div>
    <div style="margin-top:20px;">
        @if(session('message'))
        <div class="alert alert-danger" style="margin-top: 10px;">
            {{ session('message') }}
        </div>
        @endif

        @if(session('msg'))
        <div class="alert alert-success" style="margin-top: 10px;">
            {{ session('msg') }}
            
        </div>
        @endif

    </div>
   

    <script>
    function showCartype() {
        const carTypeValue = document.getElementById('car_type').value;
        const container = document.getElementById('cartypeContainer');
        container.innerHTML = ''; // Clear previous content

        const placeSelect = document.createElement('select');
        placeSelect.id = 'place';
        placeSelect.name = 'place_id';

        // Add options based on car type
        if (carTypeValue === 'small') {
            const currentTime = new Date();
            const currentHour = currentTime.getHours();
            const startTime = 9; 
            const endTime = 23; 

            if (currentHour >= startTime && currentHour < endTime) {
                addOptions(placeSelect, 1, 20); 
            } else {
                addOptions(placeSelect, 1, 10); 
            }
        } else if (carTypeValue === 'big') {
            addOptions(placeSelect, 11, 20); 
        }

        container.appendChild(placeSelect);
    }

    // Function to add options to select element
    function addOptions(selectElement, start, end) {
        for (let i = start; i <= end; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            selectElement.appendChild(option);
        }
    }

    // Attach event listener
    document.getElementById('car_type').addEventListener('change', showCartype);

    // Initial call to showCartype() when the page loads
    showCartype();
</script>

<div id="map-container">
    <div id="parking-selector">
        <label for="city-select" style="margin-top:5px;margin-left:65px; font-size:17px;"> our location:</label>
        
    </div>

    <div id="map"></div>
</div>

<script type="text/javascript">
    let map;
    let markers = [];

    function initMap() {
        const initialCity = "tangier"; // Default city
        const initialLatLng = getCityCoordinates(initialCity);

        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: initialLatLng,
        });

        addMarker(initialLatLng, initialCity);
    }

    function getCityCoordinates(city) {
        switch (city) {
            case "tangier":
                return { lat: 35.794270, lng: -5.834896 };
            case "casablanca":
                return { lat: 33.5731104, lng: -7.5898434 };
            case "rabat":
                return { lat: 34.020882, lng: -6.841650 };
            // Add more cases for additional cities
            default:
                return { lat: 35.794270, lng: -5.834896 }; // Default to Tangier
        }
    }

    function changeCity() {
        const selectedCity = document.getElementById("city-select").value;
        const newLatLng = getCityCoordinates(selectedCity);

        map.setCenter(newLatLng);
        addMarker(newLatLng, selectedCity);
    }

    function addMarker(position, city) {
        // Clear previous markers
        markers.forEach(marker => {
            marker.setMap(null);
        });
        markers = [];

        // Add new marker
        const marker = new google.maps.Marker({
            position: position,
            map: map,
            title: `Parking in ${city}`,
        });
        markers.push(marker);
    }

    window.initMap = initMap;
</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>

</x-app-layout>

</body>
</html>