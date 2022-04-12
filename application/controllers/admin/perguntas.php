<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perguntas extends CI_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('admin/form_perguntas');
        $this->load->view('footer');
    }

    public function gravar() {
        $data_pergunta['enunciado'] = $this->input->post("pergunta");
        $data_respostas['resposta'] = $this->input->post("resposta");
        $data_respostas['valores'] = $this->input->post("valor");

        $this->load->model("Perguntas_model");

        $idReferencia = $this->Perguntas_model->gravarPergunta($data_pergunta);
        $insRespostas = $this->Perguntas_model->gravarRespostas($idReferencia, $data_respostas);
        
        redirect("admin/perguntas");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */