<?php
get('/', 'pages/home.php');

get('/404', 'pages/404.php');

get('/404/$id', 'pages/404.php');

get('/user', 'pages/user.php');

get('/user/$id', 'pages/user.php');

get('/user/$id/$time', 'pages/user.php');

get('/todo', 'pages/todo.php');

get('/home', 'pages/home.php');
