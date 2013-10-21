<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/bootSearch', function()
{
    if (Holmes::is_mobile() == true)
    {
        return View::make('bootSearchMobile');
    }
    else
    {
        return View::make('sneakerSearch');
    }


	
});

Route::post('/pull', function()
{
	return View::make('pull');
});


Route::post('/eastbay', function()
{
	return View::make('eastbay');
});
Route::any('/proDirect', function()
{
	return View::make('proDirect');
});
Route::any('/wegotsoccer', function()
{
	return View::make('wegotsoccer');
});
Route::any('/worldsoccershop', function()
{
	return View::make('worldsoccershop');
});





Route::get('home', array('before' => 'auth', 'do' => function() {
    return View::make('home');
}));

Route::get("login", "UserController@setupController");

Route::post("login", "UserController@processForm");


Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('login');
});

Route::get('/test', function()
{
	return View::make('test');
});

Route::get('/users', function()
{
	$users = User::all();

    return View::make('users')->with('users', $users);
});

Route::get('/usersDT', function()
{

    $players = Player::select(array('players.id', 'players.playername','players.positionone','players.positiontwo','players.club','players.vision','players.goalkicking','players.tackling','players.offloads','players.kicking'));

	return Datatables::of($players)->make();
});

Route::get('/DTTest', function()
{

	return View::make('dataTableTest');
});


Route::post('/submitcell', function()
{
//	$users = User::all();
	$aColumns = array( 'id', 'playerName', 'positionone', 'positiontwo', 'club', 'vision', 'goalkicking', 'tackling', 'offloads', 'kicking');
	$id = Input::get('id');
	$value = Input::get('value');
	$column = $aColumns[Input::get('column')];
	Player::where('id', '=', $id)->update(array($column => $value));

    return Input::get('value');
});

// Route::post('/{value}', function($value)
// {
// //	$users = User::all();
// //	Player::where('playername', '=', ' Corey Parker')->update(array('club' => 'BRB'));

//     return $value;
// });