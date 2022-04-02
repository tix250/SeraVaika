<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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
	public function index()
	{
		
		$data=array();
		$array=array();
		$pagination[]='first';
		$pagination[]='second';
		$pagination[]='third';
		$pagination[]='third';
		$data['paginations']=$pagination;
		//modif kenny debut
		$data['adresse']=['#','location','ventes','location'];
		$data['textArray']=['Bienvenue sur e-Vaika','Location de voiture','Vente de voiture','e-Vaika'];
		$this->load->model('listeArticle');
		$article=new listeArticle();
		$data['trioVentes']=$article->getVenteRand3();
		$data['trioLocations']=$article->getLocationRand3();
		//modf kenny fin
		$data['vue']='acceuil.php';
		$data['title']='Accueil';
		$this->load->view('template',$data);
	}
	// public function cars()
	// {
	// 	$data=array();
	// 	$data['vue']='cars.php';
	// 	$data['title']='Les voitures';
	// 	$this->load->view('template',$data);
	// }
	public function about()
	{
		$data=array();
		$data['vue']='about-us.php';
		$data['title']='A propos de nous';
		$this->load->view('template',$data);
	}
	public function blogPostDetails()
	{
		$data=array();
		$data['vue']='blog-post-details.php';
		$this->load->view('template',$data);
	}
	public function contact()
	{
		$data=array();
		$data['vue']='contact.php';
		$data['title']='Nous contacter';
		$this->load->view('template',$data);
	}
	public function team()
	{
		$data=array();
		$data['vue']='team.php';
		$this->load->view('template',$data);
	}	
	public function ventes()
	{
		$data=array();
		$data['vue']='testimonials.php';
		$data['title']='Les ventes';
		$this->load->view('template',$data);
	}	
	public function login()
	{
		$data=array();
		$data['vue']='login.php';
		$data['title']='Se connecter';
		$this->load->view('loginTemplate.php',$data);
	}
	public function register()
	{
		$data=array();
		$data['vue']='register.php';
		$data['title']='Inscription';
		$this->load->view('loginTemplate.php',$data);
	}
}
