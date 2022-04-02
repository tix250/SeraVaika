<?php
//session_start();  
 class AjoutPanier_model extends CI_Model  
 {  
      function ajoutPanier($idUser  ,$idProduit, $prix , $nombre )  
      {  
         $data  =  array 
         ( 
            'idUser'  =>  $idUser  , 
            'idProduitsV'  =>  $idProduit , 
            'prixAchat'  =>  $prix,
            'valider'  =>  0,
            'nombre'  =>  $nombre
         );

        $this -> db -> insert ( 'panier' ,  $data );
      }
 }  