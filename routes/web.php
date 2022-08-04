<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\User;

Route::get('/db', function () {
/*
    $user = User::create([
        'name' => 'Taylor',
        'email' => 'Otwell6@email.ru',
        'password' => 'password6',
    ]);
*/
    //$users = DB::table('users')->get();
    $users = DB::select('select * from users');

    $servername = "db";
    $username = "root";
    $password = "1234";
    $db = 'laravel2';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

   return view('index',  ['users' => $users]   );
});


Route::get('/', function () {
    return view('welcome' );
});
