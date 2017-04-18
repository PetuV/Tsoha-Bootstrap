<?php

class UserController extends BaseController{
	public static function login() {
		View::make('user/login.html');
	}

	public static function handle_login(){
	    $params = $_POST;

	    $user = User::authenticate($params['username'], $params['password']);

	    if(!$user){
	      View::make('user/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
	    }else{
	      $_SESSION['user'] = $user->id;

	      Redirect::to('/user', array('message' => 'Tervetuloa, ' . $user->username . '.'));
	    }
	}

	public static function logout(){
	    $_SESSION['user'] = null;
	    Redirect::to('/login', array('message' => 'Sinut on kirjattu ulos.'));
	}

	public static function user() {
	  	$games = Game::findByUser($_SESSION['user']);

		View::make('user/user.html', array('games' => $games));
	}

	public static function put($game_id) {
	  	$user = User::find($_SESSION['user']);

	  	$user-> putInLibrary($game_id);

		Redirect::to('/user', array('message' => 'Peli lisätty kirjastoon.'));
	}

	public static function game($game_id) {
	  	$game = Game::findByUserAndId($_SESSION['user'], $game_id);

		View::make('game/game.html', array('game' => $game));
	}

	public static function updateGame($game_id) {
	  	$user = User::find($_SESSION['user']);

	  	$params = $_POST;

	    $user-> updateGame($params['game_id'], $params['rating'], $params['completed']);

		Redirect::to('/user', array('message' => 'Pelin tiedot päivitetty.'));
	}

	public static function destroyGame($game_id){
	    $user = User::find($_SESSION['user']);
	    $user->destroyGame($game_id);

	    Redirect::to('/user', array('message' => 'Poistaminen onnistui.'));
  	}
}