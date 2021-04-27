<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Models\User;
use App\Models\permission\Model\Role;




Auth::routes();

Route::resource('states', 'StateController');









Route::get('/dynamic_dependent', 'DynamicDependent@index');

Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');



Route::resource('students', StudentsController::class);//


Route::get('/plagas', [App\Http\Controllers\StudentsController::class, 'index'])->name('plagas');
Route::post('/plagas', [App\Http\Controllers\StudentsController::class, 'create'])->name('plagas.create');
Route::get('/careers', [App\Http\Controllers\StudentsController::class, 'getCareers']);



Route::get('/principal', function () {
    return view('principal');
});


Route::get('/nedd', function () {
    return view('nedd');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});



Route::get('/', function () {
    return view('welcome');
})->name('inicio');


Route::get('/quienes', function () {
    return view('principal');
})->name('quienes');


Route::get('/ayuda', function () {
    return view('nedd');
})->name('ayuda');



Route::get('/test', function () {
	//return 'hola';
	
	/*
   return Role::create([
		'name'=>'Admin',
		'slug'=>'admin',
		'descripcion'=> 'Administrador',
		'full-access'=>'yes'
	]);



	return Role::create([
	'name'=>'Auxiliar',
	'slug'=>'auxiliar',
	'descripcion'=> 'Auxiliar',
	'full-access'=>'no'
]);
*/


$user =User:: find(1);

//$user->roles()->attach([1,3]);
//$user->roles()->detach([1]);

$user->roles()->sync([1]);

return $user->roles;

});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/finca', [App\Http\Controllers\FincaController::class, 'index'])->name('finca');


Route::get('/unidad', [App\Http\Controllers\UnidadController::class, 'index'])->name('unidad');

Route::get('/valor', [App\Http\Controllers\ValorController::class, 'index'])->name('valor');

Route::get('/presion', [App\Http\Controllers\PresionController::class, 'index'])->name('presion');


Route::get('/enfermedades', [App\Http\Controllers\EnfermedadesController::class, 'index'])->name('enfermedades');





Route::get('/beneficio', [App\Http\Controllers\BeneficioController::class, 'index'])->name('beneficio');
Route::get('/cobertura', [App\Http\Controllers\CoberturaController::class, 'index'])->name('cobertura');
Route::get('/agua', [App\Http\Controllers\AguaController::class, 'index'])->name('agua');
Route::get('/semillas', [App\Http\Controllers\SemillasController::class, 'index'])->name('semillas');
Route::get('/empleos', [App\Http\Controllers\EmpleosController::class, 'index'])->name('empleos');
Route::get('/organizacion', [App\Http\Controllers\OrganizacionsController::class, 'index'])->name('organizacion');
Route::get('/innovacion', [App\Http\Controllers\InnovacionController::class, 'index'])->name('innovacion');
Route::get('/capacitacion', [App\Http\Controllers\CapacitacionController::class, 'index'])->name('capacitacion');
Route::get('/dependencias', [App\Http\Controllers\DependenciaController::class, 'index'])->name('dependencias');
Route::get('/ahorros', [App\Http\Controllers\AhorrosController::class, 'index'])->name('ahorros');
Route::get('/calidades', [App\Http\Controllers\CalidadesController::class, 'index'])->name('calidades');

Route::get('/riquezas', [App\Http\Controllers\RiquezasController::class, 'index'])->name('riquezas');


Route::get('/alimentarias', [App\Http\Controllers\AlimentariasController::class, 'index'])->name('alimentarias');







//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);//


	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::resource('finca', 'App\Http\Controllers\FincaController', ['except' => ['show']]);//
	Route::resource('unidad', 'App\Http\Controllers\UnidadController', ['except' => ['show']]);//
	Route::resource('valor', 'App\Http\Controllers\ValorController', ['except' => ['show']]);//
	Route::resource('beneficio', 'App\Http\Controllers\BeneficioController', ['except' => ['show']]);//
	Route::resource('cobertura', 'App\Http\Controllers\CoberturaController', ['except' => ['show']]);//

	Route::resource('presion', 'App\Http\Controllers\PresionController', ['except' => ['show']]);//


	Route::resource('agua', 'App\Http\Controllers\AguaController', ['except' => ['show']]);//
	Route::resource('semillas', 'App\Http\Controllers\SemillasController', ['except' => ['show']]);//
	Route::resource('empleos', 'App\Http\Controllers\EmpleosController', ['except' => ['show']]);//
	Route::resource('participacion', 'App\Http\Controllers\ParticipacionController', ['except' => ['show']]);//
	Route::resource('organizacion', 'App\Http\Controllers\OrganizacionController', ['except' => ['show']]);//

	Route::resource('innovacion', 'App\Http\Controllers\InnovacionController', ['except' => ['show']]);//

	Route::resource('capacitacion', 'App\Http\Controllers\CapacitacionController', ['except' => ['show']]);//

	Route::resource('dependencias', 'App\Http\Controllers\DependenciaController', ['except' => ['show']]);//



	Route::resource('ahorros', 'App\Http\Controllers\AhorrosController', ['except' => ['show']]);//
	Route::resource('alimentarias', 'App\Http\Controllers\AlimentariasController', ['except' => ['show']]);//
	Route::resource('plagas', 'App\Http\Controllers\StudentsController', ['except' => ['show']]);//
	Route::resource('calidades', 'App\Http\Controllers\CalidadesController', ['except' => ['show']]);//

	Route::resource('riquezas', 'App\Http\Controllers\RiquezasController', ['except' => ['show']]);//


	
	Route::resource('enfermedades', 'App\Http\Controllers\EnfermedadesController', ['except' => ['show']]);//




});

