<?php 
defined('BASEPATH') OR exit('No direct script access allowed');  
class AboutControlleur extends CI_Controller {  
  public function about()
  {
      
      $pro=$this->getNous();

      $data=array();
      $data['nous']=$pro;
      $data['vue']='about-us.php';
      $data['title']='A propos de nous';
      $this->load->view('template',$data);
  }
  function getNous() {
            $this->load->model('Nous_model');
            $tab[]=new Nous_model(); 
            $tab[0]->setAll("Andriatsihiva","Ny Mahatoky Hasina","Promotion 13","21","A","ITUniversity","ETU001092");
            $tab[]=new Nous_model(); 
            $tab[1]->setAll("RADOHARIVOLA","Anjatiana Kenny Brian","Promotion 13","47","A","ITUniversity","ETU001118");
            $tab[]=new Nous_model(); 
            $tab[2]->setAll("July","Chantony Hansley","Promotion 13","28","A","ITUniversity","ETU001099");
            $tab[]=new Nous_model(); 
            $tab[3]->setAll("RAKOTOARISOA","Hasimiandra Hajaniarivo","Promotion 13","61","A","ITUniversity","ETU001132");
            $tab[]=new Nous_model(); 
            $tab[4]->setAll("RANDRIAMPARANY","Harindimby Heriot","Promotion 13","100","A","ITUniversity","ETU001171");
            $tab[]=new Nous_model(); 
            $tab[5]->setAll("RAHARILOVATIANA","Sitrakiniaina","Promotion 13","51","A","ITUniversity","ETU001122");
            $tab[]=new Nous_model(); 
            $tab[6]->setAll("RAJOELISON","Tanjona Mamonjisoa Claude","Promotion 13","57","A","ITUniversity","ETU001128");
            $tab[]=new Nous_model(); 
            $tab[7]->setAll("RAJEMISA","Herizo Manisa Tiana","Promotion 13","56","A","ITUniversity","ETU001127");
            $tab[]=new Nous_model(); 
            $tab[8]->setAll("RAKOTONDRAIBE","Michael","Promotion 13","69","A","ITUniversity","ETU001140");
            $tab[]=new Nous_model(); 
            $tab[9]->setAll("RABEMANANJARA","MANDIMBISON Todihery Parfait","Promotion 13","40","A","ITUniversity","ETU001111");
            $tab[]=new Nous_model(); 
            $tab[10]->setAll("RAKOTOARISON","Noantsoa Anthony Michel","Promotion 13","63","A","ITUniversity","ETU001134");
            $tab[]=new Nous_model(); 
            $tab[11]->setAll("ANDRIAMANAMIHAGA","Zo Toavina","Promotion 13","04","A","ITUniversity","ETU001073");
            $tab[]=new Nous_model(); 
            $tab[12]->setAll("ANDRIANJAFISON","Heritiana Andriamihaja","Promotion 13","19","A","ITUniversity","ETU001090");
            return $tab;
  }
}  