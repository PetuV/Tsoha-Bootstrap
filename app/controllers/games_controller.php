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
	    $attributes = array(
	      'name' => $params['name'],
	      'dev' => $params['dev'],
	      'released' => $params['released'],
	      'genre' => $params['genre']
	    );
	    $game = new Game($attributes);

	    $errors = $game->errors();

		if(count($errors) == 0){
			$game->save();

			Redirect::to('/games/' . $game->id, array('message' => 'Peli on lisätty listaan.'));
		} else{
		   View::make('game/add.html', array('errors' => $errors, 'attributes' => $attributes));
		}
	}

  public static function edit($id){
    $game = Game::find($id);
    View::make('game/edit.html', array('attributes' => $game));
  }

  public static function update($id){
	    $params = $_POST;
	    $attributes = array(
	   	  'id' => $id,
	      'name' => $params['name'],
	      'dev' => $params['dev'],
	      'released' => $params['released'],
	      'genre' => $params['genre']
	    );
	    $game = new Game($attributes);

	    $errors = $game->errors();

		if(count($errors) == 0){
			$game->update();

			Redirect::to('/games/' . $game->id, array('message' => 'Muokkaaminen onnistui.'));
		} else{
		   View::make('game/edit.html', array('errors' => $errors, 'attributes' => $attributes));
		}
	}

	public static function destroy($id){
    $game = new Game(array('id' => $id));
    $game->destroy();

    Redirect::to('/games', array('message' => 'Poistaminen onnistui.'));
  }
}