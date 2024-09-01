<?php

namespace Home;
use post\Post;
use database\DataBase;
require_once 'database.php';
use Exception;


class HomeController{

    public function register(){
        require_once 'register.php';
    }

    public function login(){
        require_once 'login.php';
    }

    public function posts(){
        require_once 'post.php';
        $posts = new Post;
        $posts->index();
    }


    public function dbreg($request){
        $db = new Database();
        $request['Password'] = password_hash($request['Password'], PASSWORD_DEFAULT);
        $db->insert('users', array_keys($request), $request);
        return;
    }



}