<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InscriptionController extends CI_Controller {
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
	public function register()
	{
		$data=array();
		$data['vue']='register.php';
		$data['title']='Inscription';
		$this->load->view('loginTemplate.php',$data);
	}
	public function confirmLogin()
	{
		$postData = $this->input->post();
		if($this->inscriptionUtilisateur($postData['nom'],$postData['prenom'],$postData['email'],$postData['contact'],$postData['sexe'],$postData['date'],$postData['adresse'],$postData['cin'],$postData['pass']))
        {
            $this->load->library('session');
            $this->session;
            $id = $this->getIdConnexion($postData['email']);
            $this->session->set_userdata('email',$id);
            redirect(base_url() . 'index.php/');
        }
        else
        {
            $data=array();
            $data['vue']='register.php';
            $data['title']='Inscription';
            $date['erreur'] = 'Inscription échoué';
            $this->load->view('loginTemplate.php',$data);
        }
	}
    public function inscriptionUtilisateur($nom,$prenom,$email,$contact,$sexe,$date,$adresse,$cin,$password){
        $this->db->trans_begin();
        $sql="INSERT INTO utilisateur(nom,prenom,email,contact,sexe,dateDeNaissance,adresse,CIN) values (%s,%s,%s,%s,%s,%s,%s,%s)";
        $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($prenom),$this->db->escape($email),$this->db->escape($contact),$this->db->escape($sexe),$this->db->escape($date),$this->db->escape($adresse),$this->db->escape($cin));
        $requete="INSERT INTO connexion(email,contact,mdp) values (%s,%s,%s)";
        $requete=sprintf($requete,$this->db->escape($email),$this->db->escape($contact),$this->db->escape($password));
        if($this->db->query($sql) and $this->db->query($requete))
        {
            $this->db->trans_commit();
            return true;
        }
        else
        {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function getIdConnexion($email)
    {
        $requete = "select iduser from utilisateur where email=%s limit 1";
        $requete=sprintf($requete,$this->db->escape($email));
        $query = $this->db->query($requete);
        $row = $query->row_array();
        return $row['iduser'];
    }
}
