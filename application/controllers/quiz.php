<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Quiz extends CI_Controller {

    protected $maxTime = 500;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (!$this->session->userdata('usuario')) {
            redirect("participe");
        }
        if (!$this->session->userdata('start')) {
            //Update 01 - Atualização de segundos para microsegundos
            //$this->session->set_userdata('start', date(time()));
            $this->session->set_userdata('start', microtime(true));
        }

        //Update 01 - Atualização de segundos para microsegundos
        //$data['tempo'] = $this->maxTime - (date(time()) - $this->session->userdata('start'));
        $data['tempo'] = number_format($this->maxTime - (microtime(true) - $this->session->userdata('start')), '0', '', '');

        $this->load->model("Perguntas_model");

        $data["perguntas"] = $this->Perguntas_model->selectRandom(10);
        #$data["respostas"] = $this->Perguntas_model->selectRespostasFrom($id);

        $this->load->view('header');
        $this->load->view('quiz', $data);
        $this->load->view('footer');
    }

    public function gravar() {
        $table = "";
        $score = 0;
        $start = $this->session->userdata('start');
        $idCadastro = $this->session->userdata('idCadastro');

        $this->load->model("Perguntas_model");
        $this->load->model("Cadastro_model");

        for ($i = 1; $i < 11; $i++) {
            ${"pergunta" . $i} = $this->input->post("idPergunta" . $i);
            ${"resposta" . $i} = $this->input->post("resposta" . $i);
            $resultado = $this->Perguntas_model->getValor(${"pergunta" . $i}, ${"resposta" . $i});
            if (!$resultado) {
                $resultado = array("valor" => 0);
            }
            $valores[] = $resultado;
        }

        //Update para mostrar erros e acertos
        foreach ($valores as $chave => $valor) {
            $table .= "<tr><td> Pergunta " . ($chave + 1) . "</td>";
            foreach ($valor as $pontos) {
                $icon = ($pontos == 0) ? "<span style='color:red' class='glyphicon glyphicon-remove-sign'>&nbsp</span>" : "<span style='color:green' class='glyphicon glyphicon-ok-sign'>&nbsp</span>";
                $table .= "<td>" . $icon . "</td></tr>";
                $score += $pontos;
            }
        }
        $this->session->set_userdata('tabela', $table);

        //Update 01 - Atualização de segundos para microsegundos
        //$end = date(time());
        $end = microtime(true);
        $time = $this->maxTime - ($end - $start);
        if ($time < 1) {
            $time = 1;
        }

        $totalScore = $score * $time;
        $totalScore = number_format($totalScore, 0, '', '');
        $this->Cadastro_model->pontuar($idCadastro, $totalScore);

        redirect('quiz/agradecimento');
    }

    public function agradecimento() {
        include ("Mail.php");
        include ("Mail/mime.php");

        $data['table'] = $this->session->userdata('tabela');
        $recipients = $this->session->userdata('email');

        if ($recipients) {
            $headers = array(
                'From' => "contato@quizdacopaempresa.com.br", # O 'From' é *OBRIGATÓRIO*.
                'Reply-To' => 'contato@quizdacopaempresa.com.br', # Responder e-mail para um determinado destinatário
                'To' => $recipients,
                'Subject' => 'Quiz da Copa Empresa' # Título do e-mail
            );
            $crlf = "\r\n";

            $message = "<html><head><meta http-equiv='content-type' content='text/html; charset=iso-8859-1'></head><body>";
            $message.= "<div style='background-color:#FFCA05; text-align:left'><img src='http://www.quizdacopaempresa.com.br/assets/images/logo.jpg' /></div>";
            $message.= "<div style='text-align:left; font-family:Verdana;'><h2 style='margin-bottom:30px; font-size:1.25em; color:#006837;'>Ol&aacute; " . $this->session->userdata("usuario") . "</h2>";
            $message.= "<p>Obrigado pela sua participa&ccedil;&atilde;o. O seu cadastro ser&aacute; validado e logo em seguida, voc&ecirc; poder&aacute; consultar a sua posi&ccedil;&atilde;o no <a href='http://www.quizdacopaempresa.com.br/ranking'>Ranking Geral</a></p>";
            $message.= "<p>Qualquer d&uacute;vida, entre em contato pelo email <a href='mailto:contato@quizdacopaempresa.com.br'>contato@quizdacopaempresa.com.br</a></p>";
            $message.= "<p>Boa sorte!</p></div>";
            $message.= "</body></html>";

            $mime = new Mail_mime($crlf);

            $mime->setHTMLBody($message);

            # Procesa todas as informações.
            $body = $mime->get();
            $headers = $mime->headers($headers);

            # Parâmetros para o SMTP. *OBRIGATÓRIO*
            $params = array(
                'auth' => true, # Define que o SMTP requer autenticação.
                'host' => 'smtp.quizdacopaempresa.com.br', # Servidor SMTP
                'username' => 'contato=quizdacopaempresa.com.br', # Usuário do SMTP
                'password' => '' # Senha do seu MailBox.
            );

            $mail_object = & Mail::factory('smtp', $params);
            $result = $mail_object->send($recipients, $headers, $body);
            if (PEAR::IsError($result)) {
                echo "ERRO ao tentar enviar o email. (" . $result->getMessage() . ")";
            }
        }
        $this->session->unset_userdata('start');
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('idCadastro');
        $this->session->unset_userdata('idMatricula');
        $this->session->unset_userdata('tabela');

        $this->load->view('header');
        $this->load->view('agradecimento', $data);
        $this->load->view('footer');
    }

}
