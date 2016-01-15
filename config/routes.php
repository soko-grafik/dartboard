<?php
use Ouzo\Routing\Route;

Route::get('/', 'games#index');
Route::get('/new_game', 'games#new_game');
Route::get('/end_game', 'games#end_game');
Route::get('/test', 'games#test');
Route::get('/game_content', 'games#game_content');

Route::get('/games/:id', 'games#game');
Route::post('/games', 'games#create');
Route::post('/games/restart', 'games#restart');
Route::post('/games/cancel', 'games#cancel');
Route::post('/games/next_player', 'games#next_player');

Route::get('/games/:id/stats', 'games#stats');

Route::post('/long_poll', 'events#poll');

Route::post('/hit', 'hits#index');

Route::resource('players');
