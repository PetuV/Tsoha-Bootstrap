<?php
  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('home.html');
    }

    public static function sandbox(){
      // Testaa koodiasi täällä

      $games = Game::all();
      $onegame = Game::find(1);

      Kint::dump($games);
      Kint::dump($onegame);

      View::make('helloworld.html');
    }

    public static function gamelist(){
      View::make('suunnitelmat/gamelist.html');
    }

    public static function game(){
      View::make('suunnitelmat/game.html');
    }

    public static function user(){
      View::make('suunnitelmat/user.html');
    }

    public static function login(){
      View::make('suunnitelmat/login.html');
    }
  }
