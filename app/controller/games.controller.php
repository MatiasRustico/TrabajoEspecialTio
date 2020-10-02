<?php
include_once "app/views/games.view.php";
include_once "app/models/games.model.php";


class GamesController {

    private $model;
    private $view;

    function __construct() {
        $this->view = new GamesView ();
        $this->model = new GamesModel ();
    }

    function showHome(){
        $this->view->showHome();
        
    }

    function showLogIn(){
        $this->view->showLogIn();
        
    }

    function showMarket(){
        $this->view->showMarket();
        
    }

    function showGames(){
        $games = $this->model->getGames(); //agarra los datos de la database
        $categories = $this->model->getCategories(); //agarra los datos de categorias
        $this->view->showGames($games, $categories);
        
    }

    
    function insertGame(){
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];
        $valoracion = $_POST['valoracion'];
        $descripcion = $_POST['descripcion'];

        if (empty($nombre) || empty($precio) || empty($categoria) || empty($valoracion)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $id = $this->model->addGame($nombre, $precio,  $categoria, $descripcion, $valoracion);

        header("Location: " . BASE_URL . "games"); 
    }

    function deleteGame($id){
        $this->model->removeGame($id);
        header("Location: " . BASE_URL . "games"); 
    }

    function showCategorieItem($CategorieSelected){
        $games = $this->model->getGames();
        $categories = $this->model->getCategories();
        $this->view->showCategorie($categories, $games, $CategorieSelected);
    }
}
