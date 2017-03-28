<?php

class GameController extends BaseController{
	public static function index(){
		$games = Game::all();

		View::make('game/gamelist.html', array('games' => $games));
	}

	public static function game($id){
		$game = Game::find($id);

		View::make('game/game.html', array('game' => $game));
	}

	public static function create(){
		View::make('game/add.html');
	}

	public static function store(){
    $params = $_POST;
    $game = new Game(array(
      'name' => $params['name'],
      'dev' => $params['dev'],
      'released' => $params['released'],
      'genre' => $params['genre']
    ));

    // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
    $game->save();

    // Ohjataan käyttäjä lisäyksen jälkeen pelin esittelysivulle
    Redirect::to('/games/' . $game->id, array('message' => 'Peli on lisätty listaan.'));
  }
}