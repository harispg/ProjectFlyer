<?php
Route::get('/', 'FlyersController@index')->name('home');
Route::resource('flyers', 'FlyersController');

Route::get('/login/facebook', 'SessionsController@redirectToProvider')->name('facebook');
Route::get('/login/facebook/callback', 'SessionsController@handleProviderCallback');
Route::get('{zip}/{street}', 'FlyersController@show');
Route::post('{zip}/{street}/photos', 'PhotosController@store')->name('addPhotos');
Route::delete('/photos/{id}', 'PhotosController@destroy');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy')->name('logout');

Route::get('/test', function (){
	$variable = 'tri';
	echo  <<<EOT
     My name is Haris. I am printing some $variable.
Now, I am printing some {$variable}.
This should print a capital 'A': \x41
EOT;

});

