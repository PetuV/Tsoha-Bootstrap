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

  $routes->get('/games/:id', function($id) {
    GameController::game($id);
  });

  $routes->get('/login', function() {
    HelloWorldController::login();
  });

  $routes->get('/user', function() {
    HelloWorldController::user();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
