<?php

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

// Sisäänkirjautuminen
Route::get('/', function () {
    return view('auth/login');
});
// Rekisteröityminen
Route::get('/register', function () {
    return view('/register');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  // Kirjautuminen
  Route::get('/etusivu', 'HomeController@index')->name('etusivu');
  Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
  // Omat ilmoitukset
  Route::get('/etusivu', 'OmatIlmoituksetController@omatilmoitukset');
  // Ilmoituksen luominen ja poisto
  Route::get('ilmoitus', 'IlmoitusController@form');
  Route::post('ilmoitus', 'IlmoitusController@create');
  Route::get('/omailmoitus', 'OmaIlmoitusController@naytailmoitus');
  Route::get('delete/{tehtavaid}','PoistaIlmoitusController@destroy');
  // Toimeksiannot
  Route::get('toimeksiannot', 'TehtavaController@list_all');
  // Tarjouksen teko
  Route::get('/tarjous', 'TarjousController@naytatehtava');
  Route::post('/tarjous', 'TarjousController@teetarjous');
  // Tarjouksen hyväksyminen ja hylkäys
  Route::get('/', 'HyvaksyTarjousController@hyvaksytarjous');
  Route::post('/', 'HylkaaTarjousController@hylkaatarjous');
  // Omat tiedot
  Route::get('/omattiedot','OmatTiedotController@naytatiedot');
  Route::post('/omattiedot','OmatTiedotController@paivitatiedot');
  // Creditit
  Route::get('/credit', 'CreditController@naytaCredit');
  Route::post('/credit', 'CreditController@lisaaCredit');
  // Hyvaksytyt tehtavat
  Route::get('/tehtavat', 'HyvaksyttyController@naytatehtava');
  // Palautteen anto
  Route::get('/palaute', 'AnnaPalauteController@annapalaute');
  Route::post('/palaute', 'AnnaPalauteController@lahetapalaute');
  // Käyttäjä arviot
  Route::get('/arvio', 'ArvioController@nayta_arviot');
  
});