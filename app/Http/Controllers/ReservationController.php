<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Place;
use App\Rules\totime;
use App\Models\Review;

use App\Rules\fromtime;
use App\Models\Reservation;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    
    public function createres(Request $request) {
        $incomingFields = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'place_id' => 'required',
            'car_type' => 'required'
        ]);
    
        // Strip tags from incoming fields
        $incomingFields['from'] = strip_tags($incomingFields['from']);
        $incomingFields['to'] = strip_tags($incomingFields['to']);
        $incomingFields['place_id'] = strip_tags($incomingFields['place_id']);
        $incomingFields['car_type'] = strip_tags($incomingFields['car_type']);
        $incomingFields['user_id'] = auth()->id();
    
        $place_id = $incomingFields['place_id'];
    
        $res = Place::where('id', $place_id)
                    ->where('statut', 1)
                    ->exists();
        if ($res) {
            return redirect('/dashboard')->with('message', 'There are overlapping reservations for this place during the specified time.');
        }
    
        $overlappingReservations = Reservation::where('place_id', $place_id)
                                            ->where(function ($query) use ($incomingFields) {
                                                $query->whereBetween('from', [$incomingFields['from'], $incomingFields['to']])
                                                      ->orWhereBetween('to', [$incomingFields['from'], $incomingFields['to']]);
                                            })
                                            ->exists();
    
        if ($overlappingReservations) {
            return redirect('/dashboard')->with('message', 'There are overlapping reservations for this place during the specified time.');
        }
    
        // Calculate the difference in hours and scale by 5
        $ftInSeconds = strtotime($incomingFields['to']) - strtotime($incomingFields['from']);
        $ftInHours = $ftInSeconds / 3600;
        $ft = $ftInHours * 5;
        $incomingFields['ft'] = $ft;
        Reservation::create($incomingFields);
    
        $places = Place::all();
        $posts = auth()->user()->UsersPosts()->latest()->get();
        
return view('index')->with([
    'ft' => $ft,
    'msg' => 'Reservation created successfully.' ,
    
]);
    
    }
    public function index(){
        $reservations = Reservation::orderBy('id', 'desc')->get();
        $total = Reservation::count();
        return view('admin.reservation.home', compact(['reservations', 'total']));
    }
    public function create(){
        return view('admin.reservation.create');
    }
    public function save(Request $request){
        $validation = $request->validate([
            'place_id'=> 'required' ,
            'from'=> 'required' ,
            'to'=> 'required' ,
            'car_type'=> 'required' ,
        
        ]);
        $validation['place_id'] = strip_tags($validation['place_id']);
        $validation['from'] = strip_tags($validation['from']);
        $validation['to'] = strip_tags($validation['to']);
        $validation['car_type'] = strip_tags($validation['car_type']);

        $validation['user_id'] = auth()->id();
        $data = Reservation::create($validation);
        if ($data) {
            session()->flash('success', 'reservation crée');
            return redirect(route('admin/reservation'));
        } else {
            session()->flash('error', 'erreur');
            return redirect(route('admin.reservation/create'));
        }
    }
    public function edit($id)
    {
        $reservations= Reservation::findOrFail($id);
        return view('admin.reservation.update', compact('reservations'));
    }
    public function delete($id)
    {
        $reservations = Reservation::findOrFail($id)->delete();
        if ($reservations) {
            session()->flash('success', 'reservation Deleted Successfully');
            return redirect(route('admin/reservation'));
        } else {
            session()->flash('error', 'reservation Not Delete successfully');
            return redirect(route('admin/reservation/'));
        }
    }
    public function cr(){
        return view('reserver');
    }
    public function gres(){
      
        return view('reserver');
    }


    public function update(Request $request, $id)
    {
        $reservations = Reservation::findOrFail($id);
        $place_id = $request->place_id;
        $from = $request->from;
        $to = $request->to;
        $car_type = $request->car_type;
 
        $reservations->place_id = $place_id;
        $reservations->from = $from;
        $reservations->to = $to;
        $reservations->car_type  = $car_type;
        $data = $reservations->save();
        if ($data) {
            session()->flash('success', 'reservation Update Successfully');
            return redirect(route('admin/reservation'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/reservation/update'));
        }
    }
    public function deleteExpiredReservations()
    {
        $now = Carbon::now();
        
        
        $expiredReservations = Reservation::where('to', '<=', $now)->get();
    
        foreach ($expiredReservations as $reservation) {
            $reservation->delete();
        }}
        public function reviewstore(Request $request){
            $review = new Review();
            $review->star_rating = $request->rating;

            $review->save();
            return redirect()->back()->with('flash_msg_success','your request has been sent! thank you ');
        }
      
}
