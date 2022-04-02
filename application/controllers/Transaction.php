<?php defined('BASEPATH') or exit('No direct script access allowed');
class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
    }

    /**
     * Fonction pour generer le code que l'on doit donner 
     * au vendeur
     * @param $montant: le montant de la somme a verser
     * @param $vendeurId: l'idée du vendeur qui vend l'article a acheter 
     * @return data: envoie le code generer via data au vue
     * @author Toavina
     */
    public function generateCode($montant, $vendeurId)
    {
        $code = substr(md5(uniqid(rand(), true)), 16, 16);
        $this->Transaction->insertCode($montant, $vendeurId, $code);
        $data = array(
            'code' => $code
        );
        $this->load->view('Test', $data);
    }

    /**
     * function pour valider le code de versement et verser
     * l'argent dans le compte du client
     * @param $code: le code de validation donner par le client
     * @param $userId: id de d'utilisateur en cours dans la session
     * @author Toavina
     */
    public function validateCode()
    {
        $userId = $this->session->get("user")->getUserId();
        $code = $this->input->post('verifCode');
        $data = array();
        if ($this->Transaction->verifCode($code, $userId)) {
            $data['operationStatus'] = "Succès";
        } else {
            $data['operationStatus'] = "Echec";
        }
        $this->load->view('Test', $data);
    }

    public function depot()
    {
        $depot = $_POST['argent'];
        if ($depot >= 5000) {
            
            $montant = "select montant from BqUtilisateur where idUser=%s order by dateUp desc ";
            $montant = sprintf($montant, $this->session->user[0]['idUser']);
            $montant=$this->db->query($montant);
            $montant=$montant->result_array();
            if($montant[0]['montant']==NULL) {
                $montant=0;
            } else {
                $montant=$montant[0]['montant'];
            }
            $query = "insert into BqUtilisateur values (null,%s,( %s ) + %s,%s,%s,now()) ";
            $query = sprintf($query, $this->session->user[0]['idUser'],$montant, $depot, 0, $depot);
            var_dump($query);
            
            $this->db->query($query);
            redirect(site_url_spx('ProfileControlleur/accesProfile/'));
        } else {
            redirect(site_url_spx('ProfileControlleur/accesProfile?erreur=depot'));
        }
    }
    public function retrait()
    {
        $retrait = $_POST['argent'];
        if ($retrait >= 5000) {
            
            $montant = "select montant from BqUtilisateur where idUser=%s order by dateUp desc ";
            $montant = sprintf($montant, $this->session->user[0]['idUser']);
            $montant=$this->db->query($montant);
            $montant=$montant->result_array();
            if($montant[0]['montant']==NULL) {
                $montant=0;
                redirect(site_url_spx('ProfileControlleur/accesProfile?erreur=retrait'));
            } if($montant[0]['montant']<$retrait) {
                redirect(site_url_spx('ProfileControlleur/accesProfile?erreur=retrait'));
            }
            $query = "insert into BqUtilisateur values (null,%s,( %s ) - %s,%s,%s,now()) ";
            $query = sprintf($query, $this->session->user[0]['idUser'],$montant[0]['montant'],$retrait,$retrait,0);
            var_dump($query);
            
            $this->db->query($query);
            redirect(site_url_spx('ProfileControlleur/accesProfile/'));
        } else {
            redirect(site_url_spx('ProfileControlleur/accesProfile?erreur=retrait'));
        }
    }
}
