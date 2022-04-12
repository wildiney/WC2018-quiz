<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Participe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
        $this->session->unset_userdata('start');
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('idCadastro');
        $this->session->unset_userdata('idMatricula');
        
        if ($this->input->post('participar')) {
            $this->form_validation->set_message('required', 'O campo %s é de preenchimento obrigatório');
            $this->form_validation->set_message('valid_email', 'Insira um email válido');
            $this->form_validation->set_message('numeric', 'Insira somente números no campo %s');
            $this->form_validation->set_message('is_unique', 'O seu %s já foi cadastrado e já participou do quiz. Se não foi você, entre em contato conosco.');

            $this->form_validation->set_rules('nome', 'Nome', 'trim|required|xss_clean');
            $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|required|xss_clean');
            $this->form_validation->set_rules('departamento', 'Departamento', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[empresa_quiz_cadastro.email|xss_clean');
            $this->form_validation->set_rules('idMatricula', 'Id/Matrícula', 'trim|required|numeric|is_unique[empresa_quiz_cadastro.idMatricula]|xss_clean');
            $this->form_validation->set_rules('modelo', 'modelo', 'trim|required|xss_clean');
            $this->form_validation->set_rules('tamanho', 'tamanho', 'trim|required|xss_clean');
            $this->form_validation->set_rules('numero', 'numero', 'trim|required|xss_clean');
            $this->form_validation->set_rules('escritorio', 'escritorio', 'trim|required|xss_clean');
            $this->form_validation->set_rules('aceite', 'Aceite', 'required|xss_clean');

            if ($this->form_validation->run() == TRUE) {
                $data['nome'] = $this->input->post("nome");
                $data['sobrenome'] = $this->input->post("sobrenome");
                $data['departamento'] = $this->input->post("departamento");
                $data['email'] = $this->input->post("email");
                $data['idMatricula'] = $this->input->post("idMatricula");
                $data['camisetaModelo'] = $this->input->post("modelo");
                $data['camisetaTamanho'] = $this->input->post("tamanho");
                $data['camisetaNumero'] = $this->input->post("numero");
                $data['escritorio'] = $this->input->post("escritorio");
                $data['aceite'] = $this->input->post("aceite");
                if ($data['aceite'] === "on") {
                    $data['aceite'] = true;
                }

                $this->load->model("Cadastro_model");
                $this->load->model("Registro_model");
                $validar = $this->Registro_model->validate($data['idMatricula'],$data['email']);
                if($validar){
                    $data['status']=1;
                }
                if ($idCadastro = $this->Cadastro_model->gravar($data)) {
                    $this->session->set_userdata('idCadastro', $idCadastro);
                    $this->session->set_userdata('idMatricula', $data['idMatricula']);
                    $this->session->set_userdata('email', $data['email']);
                    $this->session->set_userdata('usuario', $data['nome']);
                    redirect(base_url("iniciar"));
                }
            }
        }

        $this->load->view('header');
        // if(date("Y-m-d")<"2014-06-06"){
            $this->load->view('participe');
        // } else {
        //     $this->load->view('prazoencerrado');
        // }
        $this->load->view('footer');
    }

}
