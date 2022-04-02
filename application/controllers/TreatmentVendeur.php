<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TreatmentVendeur extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function updatePublication()
	{
        $idCar=$_POST['idCar'];
        $carName=$_POST['carName'];
       // $imgName=$_POST[''];
        $anne=$_POST['anne'];
        $place=$_POST['place'];
		
        $prix=$_POST['prix'];
        $categorie=$_POST['categorie'];
        $description=$_POST['description'];
        $idtype=$_POST['type'];
		$this->load->model('profile_model');
        $this->profile_model->updateProduct($idCar,$carName,$anne,$prix,$categorie,$place,$idtype,$description);
		$this->carsVendeur();
	}

	public function deletePublication(){ 
		$this->load->model('profile_model');
		$idCar=$_POST['idCar'];
        $this->profile_model->deleteProduct($idCar);
		$this->carsVendeur();
	}

	public function carsVendeur()
	{
		$data=array();
		$data['vue']='carsVendeur.php';
		$data['title']='profile';
		$this->load->model('profile_model');
		$this->session->set_userdata('user',1);
		$idUser=$this->session->userdata('user');
		$query=$this->profile_model->getListeVoiture($idUser,"");
		$query2=$this->profile_model->getListeCategory();
		$query3=$this->profile_model->getListeType();
		$data['listeVoiture']=$query;
		$data['lCategory']=$query2;
		$data['lType']=$query3;
		$this->load->helper('assets_helper');
		$this->load->view('template.php',$data);
	}

	public function recherche()
	{
		$data=array();
		$data['vue']='carsVendeur.php';
		$data['title']='profile';
		$limit="";
		$nom=$_POST['nom'];
		$type=$_POST['type'];
		$categorie=$_POST['categorie'];
		$place=$_POST['place'];
		$this->load->model('profile_model');
		$idUser=$this->session->userdata('user');
		$query=$this->profile_model->getListeVoitureRecherche($idUser,$limit,$nom,$type,$categorie,$place);
		$query2=$this->profile_model->getListeCategory();
		$query3=$this->profile_model->getListeType();
		$data['listeVoiture']=$query;
		$data['lCategory']=$query2;
		$data['lType']=$query3;
		$this->load->helper('assets_helper');
		$this->load->view('template.php',$data);
	}

	public function insertPublication(){
		$imgFile=$_POST['imgFile'];
        $carName=$_POST['name'];
        $anne=$_POST['anne'];
        $place=$_POST['place'];
        $prix=$_POST['prix'];
        $categorie=$_POST['categorie'];
        $description=$_POST['description'];
        $idtype=$_POST['type'];
		$idUser=$this->session->userdata('user');
		$this->load->model('profile_model');
        $this->profile_model->insertProduct($idUser,$idtype,$categorie,$carName,$anne,$place,$description,$prix,$imgFile);
		$this->carsVendeur();
	}
}
