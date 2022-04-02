<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchController extends CI_Controller {
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
    public function Recherchelocation()
	{
		$postData=$this->input->post();
		$this->load->model('listeArticle');
		$article=new listeArticle();
		$data=array();
		$data['vue']='cars.php';
		$data['title']='Les locations';
		$data['title2']='Les locations';
		$data['allCategories']=$article->allCategoriesCondition($postData['categorie']);
		$data['allPlaces']=$article->allPlacesCondition($postData['place']);
		$data['allData']=$article->getAllLocationCondition($postData['nom'],$postData['categorie'],$postData['place']);
		$data['data']=$article->getLocationCondition($postData['nom'],$postData['categorie'],$postData['place']);
		$data['number_of_result']=$data['allData']->num_rows();
		$data['type']="location";
		$data['recherche']="r";
		$this->load->view('template',$data);
	}	
	public function Rechercheventes()
	{
		$postData=$this->input->post();
		$this->load->model('listeArticle');
		$article=new listeArticle();
		$data=array();
		$data['vue']='cars.php';
		$data['title']='Les ventes';
		$data['title2']='Les ventes';
		$data['allCategories']=$article->allCategoriesCondition($postData['categorie']);
		$data['allPlaces']=$article->allPlacesCondition($postData['place']);
		$data['allData']=$article->getAllVenteCondition($postData['nom'],$postData['categorie'],$postData['place']);
		$data['data']=$article->getVenteCondition($postData['nom'],$postData['categorie'],$postData['place']);
		$data['type']="ventes";
		$data['number_of_result']=$data['allData']->num_rows();
		$data['recherche']="r";
		$this->load->view('template',$data);
	}
}