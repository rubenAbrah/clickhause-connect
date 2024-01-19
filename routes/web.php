<?php

use App\Models\User;
use App\Notifications\InvoicePay;
use App\Models\Clickhouse\MyTable;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyTableController;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Admin\IndexController;
use App\Models\Clickhouse\Audit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 132;
});
Route::get('/calc', [IndexController::class, "calculare"]); 



Route::get('/notify', function () {
    $users = User::find(4);
    Notification::send($users, new  InvoicePaid('User::first()'));
    return  111;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
Route::get('clickhouse', function () {
//    return MyTable::select("*")->where('event', 'true')->getRows();
    $data =  Audit::select("*")->getRows();
    echo '<div>';
    foreach ($data as $d) {
        echo $d['dt'];
        echo "aaa";
        echo $d['event'];
        echo "<br/>";
    }
    echo '</div>'; 
});



Route::get('create',MyTableController::class);
Route::get('test',function(){

    // $new = \App\Models\User::create();
    // $tokenStr = $newUser->createToken('Token Name')->plainTextToken;
    // ->createToken($request->device_name)->plainTextToken;
    // $token = $user->createToken('token-name');
 
return \Illuminate\Support\Facades\Auth::user()->createToken('authToken')->accessToken;
});
