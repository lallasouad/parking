
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        display: none;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
</style>
<x-app-layout>
<body>
    


<div class="container">
    <div class="row">
        <div class="col mt-4">
            <form class="py-2 px-4" action="/review" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                @csrf
                <p class="font-weight-bold">Review</p>
                <div class="form-group row">
                  
                    <div class="col">
                        <div class="rate">
                            <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" class="rate" name="rating" value="4"/>
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" class="rate" name="rating" value="2">
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button class="btn btn-sm py-2 px-3 btn-info">Submit</button>
                </div>
                @if(session('flash_msg_success'))
        <div  style="margin-top: 10px;">
            {{ session('flash_msg_success') }}
        </div>
        @endif
            </form>
        </div>
    </div>
</div>


</body>
</x-app-layout>
</html>