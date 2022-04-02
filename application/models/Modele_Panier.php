<?php
class Modele_Panier extends CI_Model
{
  private $query="select * from Panier join ProduitsVoiture on ProduitsVoiture.idProduitsV=Panier.idProduitsV where Panier.idUser=%s  and valider=0";
  private $query2="select * from Panier where Panier.idUser=%s  and valider=0";
  private $queryDelete="Delete from Panier where idUser=%s and idProduitsV=%s";
  private $queryUpdate="update Panier set nombre=%s where idUser=%s and idProduitsV=%s";
  private $sumPrix="select sum(prixAchat*nombre) as sum from Panier where valider=0 and idUser=%s";
  function liste_panier()
  {
    $this->query=sprintf($this->query,$this->session->user[0]['idUser']);
    $query = $this->db->query($this->query); 
    if ($query->result_array()>0) {
      return $query->result_array();
    } else {
      return 0;
    }
  }

  function recup_panier()
  {
    $this->query2=sprintf($this->query2,$this->session->user[0]['idUser']);
    $query = $this->db->query($this->query2);
    if ($query->result_array()>0) {
      return $query->result_array();
    }
  }
  function suprimer_panier($idProduits)
  {
    $this->queryDelete=sprintf($this->queryDelete,$this->session->user[0]['idUser'],$idProduits);
    $this->db->query($this->queryDelete);
  }
  function modifier_panier($idProduits,$quantite)
  { 
    $this->queryUpdate=sprintf($this->queryUpdate,$quantite,$this->session->user[0]['idUser'],$idProduits);
    $this->db->query($this->queryUpdate);
  }
  function prixTotal_panier()
  {
    $this->sumPrix=sprintf($this->sumPrix,$this->session->user[0]['idUser']);
    $query = $this->db->query($this->sumPrix);
    if (count($query->result_array())>0) {
      return $query->result_array();
    } else {
      return 0;
    }
  }
  
}
