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
class Perguntas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function gravarPergunta($data_pergunta) {
        if ($this->db->insert('empresa_quiz_perguntas', $data_pergunta)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function gravarRespostas($idReferencia, $data_respostas) {
        $data["idPergunta"] = $idReferencia;
        $count = count($data_respostas["resposta"]);

        for ($n = 0; $n < $count; $n++) {
            $data["resposta"] = $data_respostas["resposta"][$n];
            $data["valor"] = $data_respostas["valores"][$n];

            if (!$this->db->insert('empresa_quiz_respostas', $data)) {
                echo "falha na gravação";
                return false;
            }
        }
    }

    public function selectRandom($qtd) {
        $this->db->order_by('idPerguntas', "RANDOM");
        $this->db->limit($qtd);
        $query = $this->db->get("empresa_quiz_perguntas");
        return $query->result();
    }

    public function selectRespostas($id) {
        $this->db->select('resposta, idResposta');
        $this->db->where('idPergunta', $id);
        $query = $this->db->get("empresa_quiz_respostas");
        return $query->result();
    }

    public function getValor($idPergunta, $idResposta) {
        $this->db->select('valor');
        $this->db->where('idPergunta', $idPergunta);
        $this->db->where('idResposta', $idResposta);
        $query = $this->db->get("empresa_quiz_respostas");
        //return $query->result();
        return $query->row();
    }

}
