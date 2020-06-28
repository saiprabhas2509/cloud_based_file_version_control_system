<?php
use App\file;
use App\User;
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

/*Route::get('/a', function () {
    return view('welcome');
});
*/
Route::post('profile','Profile@store');
Route::view ('/login','auth/login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view ('/index','index');
Route::view ('/filelist','filelist');

Route::get('/',function(){
    $s = file::where('access','public')->Orderby('source')->Orderby('version','desc')->get();
    return view('index',['s' => $s]);
});
Route::get('/files',function(){
    $s = file::where('access','public')->Orderby('source')->Orderby('version','desc')->get();
    return view('index',['s' => $s]);
});
Route::get('/file',function(){
    $user = auth()->user();
    $uname = $user->name;
    $data = file::where('uploader',$uname)->Orderby('source')->Orderby('version','desc')->get();
    return view('filelist',['data' => $data]);
});
Route::get('s','Profile@search');
Route::get('search','Profile@s');
    /*Route::get('/new',function(){
    $s = file::where('access','public')->distinct()->select('source','uploader')->get();
    return view('in',['s' => $s]);
});
