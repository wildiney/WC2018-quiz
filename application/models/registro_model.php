<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perguntas_model
 *
 * @author wfpimentel
 */
class Registro_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function validate($matricula,$email){
        $this->db->select("matricula,email");
        $this->db->from("empresa_quiz_registros");
        $this->db->where('matricula',$matricula);
        $this->db->where('email',$email);
        
        return $this->db->count_all_results();
    }
}
