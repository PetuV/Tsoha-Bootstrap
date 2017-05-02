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

	      Redirect::to('/user/' . $user->id, array('message' => 'Tervetuloa, ' . $user->username . '.'));
	    }
	}

	public static function logout(){
	    $_SESSION['user'] = null;
	    Redirect::to('/login', array('message' => 'Sinut on kirjattu ulos.'));
	}

	public static function user($id) {
		$user = User::find($id);
	  	$games = Game::findByUser($id);

		View::make('user/user.html', array('user' => $user, 'games' => $games));
	}

	public static function index(){
		$users = User::all();

		View::make('user/userlist.html', array('users' => $users));
	}

	public static function put($game_id) {
	  	$user = User::find($_SESSION['user']);

	  	$user-> putInLibrary($game_id);

		Redirect::to('/user/' . $_SESSION['user'], array('message' => 'Peli lisätty kirjastoon.'));
	}

	public static function game($game_id) {
	  	$game = Game::findByUserAndId($_SESSION['user'], $game_id);

		View::make('game/game.html', array('game' => $game));
	}

	public static function updateGame($game_id) {
	  	$user = User::find($_SESSION['user']);

	  	$params = $_POST;

	    $user-> updateGame($params['game_id'], $params['rating'], $params['completed']);

		Redirect::to('/user/' . $_SESSION['user'], array('message' => 'Pelin tiedot päivitetty.'));
	}

	public static function destroyGame($game_id){
	    $user = User::find($_SESSION['user']);
	    $user->destroyGame($game_id);

	    Redirect::to('/user/' . $_SESSION['user'], array('message' => 'Poistaminen onnistui.'));
  	}

  	public static function registerUser(){
	    $params = $_POST;
	    $attributes = array(
	      'username' => $params['username'],
	      'password' => $params['password']
	    );
	    $user = new User($attributes);

	    $errors = $user->errors();

		if(count($errors) == 0){
			$user->save();

			Redirect::to('/login', array('message' => 'Käyttäjä lisätty onnistuneesti.'));
		} else{
		   Redirect::to('/login', array('errors' => $errors));
		}
	}

	public static function edit($id){
		$user = User::find($id);
		View::make('user/edit.html', array('attributes' => $user));
	}

	public static function editUsername(){
	    $params = $_POST;
	    $attributes = array(
	      'id' => $params['id'],
	      'username' => $params['username'],
	      'password' => 'irrelevant'
	    );
	    $user = new User($attributes);

	    $errors = $user->errors();

		if(count($errors) == 0){
			$user->updateUsername();

			Redirect::to('/user/' . $_SESSION['user'], array('message' => 'Käyttäjänimi vaihdettu.'));
		} else{
		   Redirect::to('/user/edit', array('errors' => $errors));
		}
	}

	public static function editPassword(){
	    $params = $_POST;
	    $attributes = array(
	      'id' => $params['id'],
	      'username' => 'irrelevant',
	      'password' => $params['password']
	    );
	    $user = new User($attributes);

	    $errors = $user->errors();

		if(count($errors) == 0){
			$user->updatePassword();

			Redirect::to('/user/' . $_SESSION['user'], array('message' => 'Salasana vaihdettu.'));
		} else{
		   Redirect::to('/user/edit', array('errors' => $errors));
		}
	}

	public static function destroy($id){
	    $user = new User(array('id' => $id));
	    $user->destroy();

	    $_SESSION['user'] = null;

	    Redirect::to('/login', array('message' => 'Jäämme kaipaamaan sinua.'));
  	}
}