<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cgps', [
    'uses' => 'CgpsController@receive@receive'
]);

Route::get('/graph', [
    'middleware' => 'auth',
    'uses' => 'Graph\GraphController@view'
]);


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::get('/show-autoloaders', function(){
    foreach(spl_autoload_functions() as $callback)
    {
        if(is_string($callback))
        {
            echo '- ',$callback,"\n<br>\n";
        }

        else if(is_array($callback))
        {
            if(is_object($callback[0]))
            {
                echo '- ',get_class($callback[0]);
            }
            elseif(is_string($callback[0]))
            {
                echo '- ',$callback[0];
            }
            echo '::',$callback[1],"\n<br>\n";
        }
        else
        {
            var_dump($callback);
        }
    }
});