<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('SessionController.php');
class Checkout extends SessionController
{
    public function index()
    {
        $data = array();
        $this->load->model('Modele_Panier');
        $produitPanier = $this->Modele_Panier->liste_panier(); 
        $data = array(); 
        $data['prixPanier'] =$this->Modele_Panier->prixTotal_panier()[0]['sum'];
        $data['vue'] = 'checkout.php';
        $data['title'] = 'Payment';
        $this->load->view('template.php', $data);
    }
}
