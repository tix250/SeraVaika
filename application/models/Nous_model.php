<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Nous_model extends CI_Model{
        private $nom;
        private $prenom;
        private $promotion;
        private $numero;
        private $groupe;
        private $univ;
        private $etu;

        public function setAll($n,$p,$pr,$num,$g,$u,$e) {
            $this->nom = $n;
            $this->prenom = $p;
            $this->promotion = $pr;
            $this->numero = $num;
            $this->groupe = $g;
            $this->univ = $u;
            $this->etu = $e;
            
        }


        public function getNom() { 
            return $this->nom; 
        } 

        public function setNom($id) {  
            $this->nom = $id;
        } 
        public function getEtu() { 
            return $this->etu; 
        } 

        public function setEtu($id) {  
            $this->etu = $id;
        } 
        public function getUniv() { 
            return $this->univ; 
        } 

        public function setUniv($id) {  
            $this->univ = $id;
        } 

        public function getPrenom() { 
            return $this->prenom; 
        } 

        public function setPrenom($nom) {  
            $this->prenom = $nom; 
        } 
        public function getPromotion() { 
            return $this->promotion; 
        } 

        public function setPromotion($nom) {  
            $this->promotion = $nom; 
        } 
        public function getNumero() { 
            return $this->numero; 
        } 

        public function setNumero($nom) {  
            $this->numero = $nom; 
        } 
        public function getGroupe() { 
            return $this->groupe; 
        } 

        public function setGroupe($nom) {  
            $this->groupe = $nom; 
        } 
    }
?>