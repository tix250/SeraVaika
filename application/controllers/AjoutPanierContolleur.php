<?php
//session_start(); 
defined('BASEPATH') or exit('No direct script access allowed');
class AjoutPanierContolleur extends CI_Controller
{
     //functions  
     function ajoutPanier()
     {
          $id_user= $_SESSION['user'][0]['idUser'];
          $id_produit=$this->input->post('idProduit');
          $prix=$this->input->post('prix');
          if($this->input->post('nombre') <=1)
          {
               $nombre=1;
          }
          else
          {
               $nombre=$this->input->post('nombre');
          }
          //var_dump($prix);
          $this->load->model('AjoutPanier_model');
          $this->AjoutPanier_model->ajoutPanier($id_user, $id_produit,$prix , $nombre);
          redirect(site_url_spx('welcome/'),'0');
     }
}

