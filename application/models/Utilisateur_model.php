<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Utilisateur_model extends CI_Model{
        private $idUser;
        private $nom;
        private $prenom;
        private $email;
        private $contact;
        private $sexe;
        private $dateDeNaissance;
        private $adresse;
        private $image;

        public function getIdUser() { 
            return $this->idUser; 
        } 

        public function setIdUser($id) {  
            $this->idUser = $id;
        } 

        public function getNom() { 
            return $this->nom; 
        } 

        public function setNom($nom) {  
            $this->nom = $nom; 
        } 
        public function getPrenom() { 
            return $this->prenom; 
        } 

        public function setPrenom($nom) {  
            $this->prenom = $nom; 
        } 
        public function getEmail() { 
            return $this->email; 
        } 

        public function setEmail($nom) {  
            $this->email = $nom; 
        } 
        public function getContact() { 
            return $this->contact; 
        } 

        public function setContact($nom) {  
            $this->contact = $nom; 
        } 
        public function getSexe() { 
            return $this->sexe; 
        } 

        public function setSexe($nom) {  
            $this->sexe = $nom; 
        } 
        public function getDateDeNaissance() { 
            return $this->dateDeNaissance;
        } 

        public function setDateDeNaissance($nom) {  
            $this->dateDeNaissance = $nom; 
        } 
        public function getAdresse() { 
            return $this->adresse; 
        } 

        public function setAdresse($nom) {  
            $this->adresse = $nom; 
        } 
        public function getImage() { 
            return $this->image; 
        } 

        public function setImage($nom) {  
            $this->image = $nom; 
        } 

        public function profileUtilisateur($iduser){
            $query= $this->db->get_where('imagePerso', array('idUser' => $iduser));
            $tab=array();
            $i=0;
            foreach($query->result_array() as $row){
                $c=new Utilisateur_model();
                $c->setIdUser($row['idUser']);
                $c->setNom($row['nom']);
                $c->setPrenom($row['prenom']);
                $c->setEmail($row['email']);
                $c->setContact($row['contact']);
                $c->setSexe($row['sexe']);
                $c->setDateDeNaissance($row['dateDeNaissance']);
                $c->setAdresse($row['adresse']);
                $c->setImage($row['image']);
                $tab[$i]=$c;
                $i++;
            }
            return $tab;
        }
    }
?>
