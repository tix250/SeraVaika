<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Statistique extends CI_Model{

    public function tousVoitureParCategorie($idCategorie){
        $sql = "SELECT count(idProduitsV) as nombreVoitureParCategorie,nomVoiture FROM statistique where idCategorie=".$idCategorie." and valider=1 group by nomVoiture order by nombreVoitureParCategorie desc";
        $toutVoiture = $this->db->query($sql)->result_array();
        $table['voitureCategorie'] = $toutVoiture;
        $data = json_encode($table);
        return $data;
    }

    public function nombreVoitureParCategorie($idCategorie){
        $sql1 = "SELECT count(idProduitsV) as nombreVoiture FROM statistique where idCategorie=".$idCategorie." and valider=1";
        $voiture = $this->db->query($sql1)->result_array();
        $table['total'] = $voiture;
        $data = json_encode($table);
        return $data;
    }

    public function allProduitsVoiture(){
        return $this->db->query("SELECT*from ProduitsVoiture")->result_array();
    }

    public function allCategories(){
        return $this->db->query("SELECT*from CategorieVoitures")->result_array();
    }
}