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
class Cadastro_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function gravar($data) {
        $data['created_at'] = date("Y-m-d H:i:s");
        if ($this->db->insert('empresa_quiz_cadastro', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function pontuar($idCadastro, $pontuacao){
        $data['pontuacao'] = $pontuacao;
        $this->db->where('idCadastro',$idCadastro);
        $this->db->update('empresa_quiz_cadastro',$data);
    }

    public function selectTop($qtd){
        $this->db->select("*");
        $this->db->order_by("pontuacao desc");
        $this->db->order_by("created_at asc");
        $this->db->limit($qtd);
        $this->db->where('status','1');
        $this->db->where('pontuacao >','0');
        $query = $this->db->get("empresa_quiz_cadastro");
        return $query->result();
    }
}
