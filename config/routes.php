<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/games', function() {
    GameController::index();
  });

  $routes->post('/games', function() {
    GameController::store();
  });

  $routes->get('/games/add', function() {
    GameController::create();
  });

  $routes->get('/user/:id', function($id) {
    GameController::game($id);
  });

  $routes->get('/games/:id/edit', function($id) {
    GameController::edit($id);
  });

  $routes->post('/games/:id/edit', function($id) {
    GameController::update($id);
  });

  $routes->post('/games/:id/destroy', function($id) {
    GameController::destroy($id);
  });

  $routes->get('/login', function() {
    UserController::login();
  });

  $routes->post('/login', function() {
    UserController::handle_login();
  });

  $routes->get('/user', function() {
    UserController::user();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
