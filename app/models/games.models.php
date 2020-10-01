<?php

class GamesModel { 

    private $db;

    function __construct() {
        // 1. Abro la conexión
       $this->db = $this->connect();
    }


    private function connect(){
        //abro conexion
        $db = new PDO('mysql:host=localhost;'.'dbname=db_juegos;charset=utf8', 'root', '');
        return $db;
    }


    //devuelve los juegos de la base de datos
    function getGames(){

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM juegos');
        $query->execute();
        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $games = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de juegos

        return $games;
    }

    function addGame($nombre, $precio,  $categoria, $descripcion, $valoracion){
        //agregar a la base de datos
        $query = $this->db->prepare('INSERT INTO juegos (nombre, precio, id_categoria, descripcion, valoracion) VALUES (?,?,?,?,?)');
        $query->execute([$nombre, $precio,  $categoria, $descripcion, $valoracion]);

        return $this->db->lastInsertId();
    }

    function removeGame($id){
        $query = $this->db->prepare('DELETE FROM juegos WHERE id = ?');
        $query->execute([$id]);

    }

    function getCategories(){
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $categories = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de categorias

        return $categories;
    }
}