<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('SessionController.php');
class PanierControlleur extends SessionController { 
		public function panier()
		{
			$this->load->model('Modele_Panier'); 
		  	$produitPanier=$this->Modele_Panier->liste_panier();
		  	$prixTotal = 0;
		  	/*if ($produitPanier != null) {
		  		foreach ($produitPanier as $value) {
		  		$prixTotal = $prixTotal + $value['prixAchat'];
		  		}	
		  	}*/
		  	$idPanier=$this->Modele_Panier->recup_panier();
		  	$prixTotal=$this->Modele_Panier->prixTotal_panier ();
		  	
		  	$data=array();

			
			$data['produitPanier']=$produitPanier;
			$data['prixPanier']=$this->Modele_Panier->prixTotal_panier()[0]['sum'];
			$data['vue']='panier.php';
			$data['title']='panier';
			$this->load->view('template.php',$data);
		}

		public function suprimer($idPanier)
		{
			$this->load->model('Modele_Panier');
			$this->Modele_Panier->suprimer_panier($idPanier);
			redirect(base_url() . 'index.php/PanierControlleur/panier');
		}

		public function modifier($idPanier)
		{
			$quantite = $_GET['quantite'];
			$this->load->model('Modele_Panier');
			$this->Modele_Panier->modifier_panier($idPanier,$quantite);
			redirect(base_url() . 'index.php/PanierControlleur/panier');
		}
	}
