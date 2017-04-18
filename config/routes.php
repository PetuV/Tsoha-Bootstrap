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

  $routes->get('/user/:id', 'check_logged_in', function($id) {
    UserController::game($id);
  });

  $routes->post('/user/:id/edit', 'check_logged_in', function($id) {
    UserController::updateGame($id);
  });

  $routes->post('/user/:id/destroy', 'check_logged_in', function($id) {
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

  $routes->get('/user', 'check_logged_in', function() {
    UserController::user();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
