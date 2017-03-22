<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/gamelist', function() {
    HelloWorldController::gamelist();
  });

  $routes->get('/game', function() {
    HelloWorldController::game();
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
