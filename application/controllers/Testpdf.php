<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Name:  Testpdf
*
* Version: 1.0.0
*
* Author: Pedro Ruiz Hidalgo
*		  ruizhidalgopedro@gmail.com
*         @pedroruizhidalg
*
* Location: application/controllers/Testpdf.php
*
* Created:  208-02-27
*
* Description:  This demonstrates pdf library is working.
*
* Requirements: PHP5 or above
*
*/


class Testpdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->add_package_path( APPPATH . 'third_party/fpdf');
        $this->load->library('pdf');
    }

	public function index()
	{
        $str = "Reception de la part de %s la somme de %s";
        $str = sprintf($str, "E-Vaika","1 000 000 Ar");
        $this->pdf = new Pdf();
        $this->pdf->Add_Page();
        $this->pdf->setFont('Arial', 'B', 11);
        $this->pdf->Cell(200,20,$str,0,0,'C');
        $this->pdf->ln(10);
        $this->pdf->Output('page.pdf','I');
        $this->load->view('template', array('vue' => 'acceuil.php'));
	}
}

/*
* application/controllers/Testpdf.php
*/
