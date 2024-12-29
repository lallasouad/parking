<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Place;
use Illuminate\View\View;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'abonnement' => 'required',
        ]);  
        $abonnement = $request->input('abonnement');
        if ($abonnement === 'oui') {
            $request->validate([
                'car_type' => 'required',
                'place_id' => 'required',
            ]);
              
        $place_id = $request->input('place_id');
         $pp =Place::where('id', $place_id)
        ->where('statut', 1) 
        ->exists();
        if( $pp ){
            
        }
        $lastUserId = User::latest()->value('id');


          $newUserId = $lastUserId + 1;
       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'abonnement' => $request->abonnement,
        ]);
        $reservation = Reservation::create([
            'car_type' => $request->car_type,
            'place_id' => $request->place_id,
            'from' =>  Carbon::now(),
            'to' =>  Carbon::now()->addMonth(),
            'user_id' => $newUserId,
            'ft' => 200,
        ]);
 
$place = Place::find($request->place_id);
$place->statut = 1; 
$place->save();
}
$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'abonnement' => $request->abonnement,
]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
