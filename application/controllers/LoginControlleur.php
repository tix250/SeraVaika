<?php
//session_start(); 
defined('BASEPATH') or exit('No direct script access allowed');
class LoginControlleur extends CI_Controller
{
     //functions  
     function login()
     {
          if (isset($this->session->userdata['idUser'])) {
               redirect(base_url() . 'index.php/Welcome');
          }
          $data = array();
          $data['vue'] = 'login.php';
          $data['title'] = 'Se connecter';
          $this->load->view('loginTemplate.php', $data);
     }
     function login_validation()
     {
          //true  
          $email = $this->input->post('email');
          $password = $this->input->post('password');
          //model function  
          $this->load->model('Main_model');
          if ($this->Main_model->can_login($email, $password)) {
               
               $_SESSION['user']=$this->session->userdata('user');
               
               redirect(site_url_spx('welcome/'),'0');
          } else {
               $data = array();
               $data['vue'] = 'login.php';
               $data['title'] = 'Se connecter';
               $data['erreur'] = "mot de passe ou email incorrect";
               $this->load->view('loginTemplate.php', $data);
               redirect(base_url() . 'index.php/welcome/login/erreur');
          }
     }

     function logout()
     {
          session_destroy();
          redirect(base_url() . 'index.php/Welcome');
     }
}
