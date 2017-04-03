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

	      Redirect::to('/', array('message' => 'Tervetuloa, ' . $user->username . '.'));
	    }
	}

	public static function user() {
	  	$games = Game::findByUser($_SESSION['user']);

		View::make('user/user.html', array('games' => $games));
	}

	public static function userGame($game_id) {
	  	$game = Game::findByUserAndId($_SESSION['user'], $game_id);

		View::make('user/game.html', array('game' => $game));
	}
}