<?php

if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Ranking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
        $this->load->model("Cadastro_model");

        $data["ranking"] = $this->Cadastro_model->selectTop(2000);

        $this->load->view('header');
            if(date("Y-m-d")<"2014-06-06"){
                $this->load->view('ranking', $data);
            } else {
                $this->load->view('prazoencerrado');
            }
        $this->load->view('footer');
    }

}