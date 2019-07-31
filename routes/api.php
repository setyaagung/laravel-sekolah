<?php

use Illuminate\Http\Request;
use App\Siswa;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('siswa', function()
{
	return Siswa::paginate(3);

});

Route::get('siswa/{siswa}', function($id)
{
	return Siswa::find($id);
});


Route::post('siswa', function()
{
	 return Siswa::create(request()->all());
});

Route::delete('siswa/{siswa}', function(Siswa $siswa)
{
	 $siswa->delete();
	 return 'success';
});

Route::post('/siswa/{id}/editnilai', 'ApiController@editnilai');