<?php

  function check_logged_in(){
    BaseController::check_logged_in();
  }

  function user_logged_in(){
    BaseController::get_user_logged_in();
  }

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/games', function() {
    GameController::index();
  });

  $routes->post('/games', 'check_logged_in', function() {
    GameController::store();
  });

  $routes->get('/games/add', 'check_logged_in', function() {
    GameController::create();
  });

  $routes->get('/user/edit', 'check_logged_in', function() {
    UserController::edit($_SESSION['user']);
  });

  $routes->post('/user/destroy', 'check_logged_in', function() {
    UserController::destroy($_SESSION['user']);
  });

  $routes->post('/user/editUsername', 'check_logged_in', function() {
    UserController::editUsername();
  });

  $routes->post('/user/editPassword', 'check_logged_in', function() {
    UserController::editPassword();
  });

  $routes->get('/user/game/:id', 'check_logged_in', function($id) {
    UserController::game($id);
  });

  $routes->post('/user/game/:id/edit', 'check_logged_in', function($id) {
    UserController::updateGame($id);
  });

  $routes->post('/user/game/:id/destroy', 'check_logged_in', function($id) {
    UserController::destroyGame($id);
  });

  $routes->get('/games/:id/edit', 'check_logged_in', function($id) {
    GameController::edit($id);
  });

  $routes->post('/games/:id/edit', 'check_logged_in', function($id) {
    GameController::update($id);
  });

  $routes->post('/games/:id/destroy', 'check_logged_in', function($id) {
    GameController::destroy($id);
  });

  $routes->get('/games/:id/put', 'check_logged_in', function($id) {
    UserController::put($id);
  });

  $routes->get('/login', function() {
    UserController::login();
  });

  $routes->post('/login', function() {
    UserController::handle_login();
  });

  $routes->post('/logout', function(){
    UserController::logout();
  });

  $routes->post('/register', function() {
    UserController::registerUser();
  });

  $routes->get('/user/:id', function($id) {
    UserController::user($id);
  });

  $routes->get('/users', function() {
    UserController::index();
  });
