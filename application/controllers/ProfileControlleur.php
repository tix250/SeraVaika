<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProfileControlleur extends CI_Controller
{
  public function accesProfile()
  {
    $id = $this->session->user[0]['idUser'];
    $this->load->model('Utilisateur_model');
    $u = new Utilisateur_model();
    $pro = $u->profileUtilisateur($id);

    $data = array();
    $data['user'] = $pro;
    $data['vue'] = 'profile.php';
    $data['title'] = 'profile';

    $this->load->model('profile_model');
    $query = $this->profile_model->getListeVoiture($id, "3");
    $query2 = $this->profile_model->getListeCategory();
    $query3 = $this->profile_model->getListeType();
    //$query2=$this->mainModel_model->getListeCategory();
    $data['listeVoiture'] = $query;
    $data['lCategory'] = $query2;
    $data['lType'] = $query3;
    //$data['lCategory']=$query2;

    $this->load->model('statistique');
    $state = new statistique();
    $data['categorie'] = $state->allCategories();
    /* SEPARATION */
		 
		$this->load->model('statistique');
		$state=new statistique();
		$data['categorie']=$state->allCategories();
		$data['produitsVoiture'] = $state->allProduitsVoiture();
		$data['tousVoitureC']=$state->tousVoitureParCategorie(1);
    $data['nombreVoitureParCategorie']=$state->nombreVoitureParCategorie(1);
    
    $montant = "select montant from BqUtilisateur where idUser=%s order by dateUp desc ";
    $montant = sprintf($montant, $this->session->user[0]['idUser']);
    $montant=$this->db->query($montant);
    $montant=$montant->result_array();

    $data['montant']=$montant[0]['montant']+0;
    $this->load->helper('assets_helper');

    $this->load->view('template.php', $data);
    //}
  }
  public function statistique($idCategorie)
	{
    $id = $this->session->user[0]['idUser'];
    $this->load->model('Utilisateur_model');
    $u = new Utilisateur_model();
    $pro = $u->profileUtilisateur($id);

    $data = array();
    $data['user'] = $pro;
    $data['vue'] = 'profile.php';
    $data['title'] = 'profile';

    $this->load->model('profile_model');
    $query = $this->profile_model->getListeVoiture($id, "3");
    $query2 = $this->profile_model->getListeCategory();
    $query3 = $this->profile_model->getListeType();
    //$query2=$this->mainModel_model->getListeCategory();
    $data['listeVoiture'] = $query;
    $data['lCategory'] = $query2;
    $data['lType'] = $query3;
    //$data['lCategory']=$query2;

    $this->load->model('statistique');

    /* SEPARATION */
		$state=new statistique();
		$data['categorie']=$state->allCategories();
		$data['produitsVoiture'] = $state->allProduitsVoiture();
		$data['tousVoitureC']=$state->tousVoitureParCategorie($idCategorie);
    $data['nombreVoitureParCategorie']=$state->nombreVoitureParCategorie($idCategorie);
    
    $montant = "select montant from BqUtilisateur where idUser=%s order by dateUp desc ";
    $montant = sprintf($montant, $this->session->user[0]['idUser']);
    $montant=$this->db->query($montant);
    $montant=$montant->result_array();

    $data['montant']=$montant[0]['montant']+0;;


    $this->load->helper('assets_helper');

    $this->load->view('template.php', $data);
    
	}
}
