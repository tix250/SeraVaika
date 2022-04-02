<?php
//session_start();  
 class Main_model extends CI_Model  
 {  
      function can_login($email, $password)  
      {  
          $query=(" select Utilisateur.* from Utilisateur join Connexion on Connexion.email=Utilisateur.email where Connexion.email='%s' and mdp=sha1('%s')");
          $query=sprintf($query,$email,$password);
          $resulat=$this->db->query($query);
          if(count($resulat->result_array()) == 1)  
          {  
               $this->session->set_userdata("user",$resulat->result_array());
               return true;  
          }  
          else  
          {  
                return false;       
          }  
      }



 }  