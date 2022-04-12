<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regulamento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('regulamento');
        $this->load->view('footer');
    }

}
