<?php

use App\Models\Post;
use App\Models\Place;
use App\Models\Reservation;
use App\Http\Controllers\rvc;
use App\Http\Controllers\ticketc;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\nnnController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\postcontroller;
use App\Http\Controllers\postcontroller2;
use App\Http\Controllers\localeController;
use App\Http\Controllers\stripeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $reservations = Reservation::all();
   
    $places = Place::all();
   
    return view('dashboard', ['places' => $places , 'reservations' => $reservations]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 
});
Route::middleware(['auth','admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('/admin/post', [postcontroller::class, 'index'])->name('admin/post');
    Route::get('/admin/ticket', [ticketc::class, 'index'])->name('admin/ticket');
    Route::get('/admin/post/create', [postcontroller::class, 'create'])->name('admin/post/create');
    Route::get('/admin/post/save', [postcontroller::class, 'save'])->name('admin/post/save');
    Route::get('/admin/post/delete/{id}', [postcontroller::class, 'delete'])->name('admin/post/delete');
    Route::get('/admin/post/edit/{id}', [postcontroller::class, 'edit'])->name('admin/post/edit');
    Route::put('/admin/post/edit/{id}', [postcontroller::class, 'actuallyUpdatePost'])->name('admin/post/update');
    Route::put('/admin/reservation/edit/{id}', [ReservationController::class, 'update'])->name('admin/reservation/update');
    Route::get('/admin/reservation', [ReservationController::class, 'index'])->name('admin/reservation');
    Route::get('/admin/reservation/create', [ReservationController::class, 'create'])->name('admin/reservation/create');
    Route::get('/admin/reservation/save', [ReservationController::class, 'save'])->name('admin/reservation/save');
    Route::get('/admin/reservation/delete/{id}', [ReservationController::class, 'delete'])->name('admin/reservation/delete');
    Route::get('/admin/reservation/edit/{id}', [ReservationController::class, 'edit'])->name('admin/reservation/edit');
    Route::get('/admin/ticket', [ticketc::class, 'index'])->name('admin/ticket');
    Route::get('admin/ticket/delete/{id}', [ticketc::class, 'delete'])->name('admin/ticket/delete');

}); 


Route::get('/payment', 'PaymentController@showPaymentForm')->name('payment.form');
Route::post('/process-payment', 'PaymentController@processPayment')->name('process.payment');


Route::get('/payment/success', function () {
    return view('payment-success');
})->name('payment.success');

Route::get('/payment/failure', function () {
    return view('payment-failure');
})->name('payment.failure');


Route::get('feedback', [postcontroller::class, 'rt']);
Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');

Route::post('/posts/{post}/like', [postcontroller::class, 'like'])->name('posts.like');

Route::post('/create-post', [postcontroller::class, 'createPost']);
Route::get('/create-reservation', [ReservationController::class, 'createres']);
Route::get('index', [nnnController::class, 'index']);
Route::get('ticket', [rvc::class, 'index']);
Route::get('locale/{lang}', [localeController::class, 'setLocale']);
Route::get('/helpserv', [ticketc::class, 'createticket']);
Route::get('reserver', [ReservationController::class, 'cr']);
Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::get('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
Route::get('/reserver', [ReservationController::class, 'gres'])->name('reserver');
Route::post('/review', [ReservationController::class, 'reviewstore'])->name('review');
Route::get('feedback', [postcontroller::class, 'showFeedbackPage'])->name('feedback');
require __DIR__.'/auth.php';
Route::get('/edit-post/{post}', [postcontroller::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [postcontroller::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [postcontroller::class, 'deletePost']);


Route::get('/counter', [ReservationController::class, 'getCounter'])->name('counter.get');
Route::post('/counter/increment', [ReservationController::class, 'incrementCounter'])->name('counter.increment');
Route::post('/counter/decrement', [ReservationController::class, 'decrementCounter'])->name('counter.decrement');
//->middleware(['auth','admin']);