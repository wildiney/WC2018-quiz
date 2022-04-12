<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1>Participe!</h1>
            <p>O quiz da copa da Empresa é um jogo exclusivo para seus profissionais para celebrar a Copa do Mundo 2014.</p>
            <p>A pontuação será gerada automaticamente considerando os acertos e o tempo utilizado para responder a 10 perguntas.</p>
            <p><strong>Você tem apenas uma chance para responder ao Quiz.</strong></p>
            <p>O preenchimento de todas as informações desta tela inicial é obrigatório e será validada com o cadastro do profissional em nosso banco de dados, sendo desclassificado em caso de divergências. Para mais informações, leia o <?php echo anchor("regulamento", "regulamento"); ?>.</p>
        </div>
    </div>

    <div class="row">
        <?php if (validation_errors()): ?>
            <div class="divErros">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <?php
                $attributes = array(
                    'method' => 'POST',
                    'name' => 'cadastro',
                    'role' => 'form',
                    'class' => 'cadastro',
                    'onsubmit' => 'return validaForm();'
                );
                echo form_open(base_url('participe'), $attributes);
                ?>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control required" id="nome" name="nome" placeholder="Nome" value="<?php echo set_value('nome'); ?>">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome">Sobrenome</label>
                            <input type="text" class="form-control required" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="<?php echo set_value('sobrenome'); ?>">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome">Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Departamento" value="<?php echo set_value('departamento'); ?>">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome">E-mail corporativo</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo set_value('email'); ?>">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome">ID / Matrícula</label>
                            <input type="text" class="form-control" id="idMatricula" name="idMatricula" placeholder="00000" value="<?php echo set_value('idMatricula'); ?>">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class=" col-lg-12 destaque-personalize">
                        <div class="col-lg-12">
                            <h2>Personalize a sua camisa da seleção</h2>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="nome">Modelo</label>
                                <?php
                                $modelos = array(
                                    '' => 'Selecione',
                                    'M' => 'Masculino',
                                    'F' => 'Feminino'
                                );
                                $options = "class='form-control'";
                                echo form_dropdown('modelo', $modelos, set_value('modelo'), $options);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tamanho">Tamanho</label>
                                <?php
                                $tamanhos = array(
                                    "" => "Selecione",
                                    "P" => "P",
                                    "M" => "M",
                                    "G" => "G",
                                    "GG" => "GG"
                                );
                                echo form_dropdown('tamanho', $tamanhos, set_value('tamanho'), $options);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="numero">Número / Jogador</label>
                                <?php
                                $numeros = array(
                                    '' => 'Selecione',
                                    '2' => '02 - Daniel Alves',
                                    '3' => '03 - Thiago Silva',
                                    '4' => '04 - David Luiz',
                                    '5' => '05 - Fernando',
                                    '6' => '06 - Marcelo',
                                    '7' => '07 - Lucas Moura',
                                    '8' => '08 - Hernanes',
                                    '9' => '09 - Fred',
                                    '10' => '10 - Neymar',
                                    '11' => '11 - Oscar',
                                    '13' => '13 - Dante',
                                    '14' => '14 - Filipe Luís',
                                    '15' => '15 - Jean',
                                    '16' => '16 - Réver',
                                    '17' => '17 - Luíz Gustavo',
                                    '18' => '18 - Paulinho',
                                    '19' => '19 - Hulk',
                                    '20' => '20 - Bernard',
                                    '21' => '21 - Jô',
                                    '23' => '23 - Jadson'
                                );
                                echo form_dropdown('numero', $numeros, set_value('numero'), $options);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nome">Escritório onde trabalha</label>
                                <?php
                                $escritorios = array(
                                    '' => 'Selecione',
                                    'AL - Maceio' => 'AL - Maceio',
                                    'BA - Salvador' => 'BA - Salvador',
                                    'BA - Tecnocentro Salvador' => 'BA - Tecnocentro Salvador',
                                    'CE - Fortaleza' => 'CE - Fortaleza',
                                    'DF - Brasilia' => 'DF - Brasilia',
                                    'GO - Goiânia' => 'GO - Goiânia',
                                    'MG - Belo Horizonte' => 'MG - Belo Horizonte',
                                    'PB - João Pessoa' => 'PB - João Pessoa',
                                    'PE - Recife' => 'PE - Recife',
                                    'RJ - Rio Branco (103)' => 'RJ - Rio Branco (103)',
                                    'RJ - Campos de Goytacazes' => 'RJ - Campos de Goytacazes',
                                    'RJ - Visconde de Inhauma' => 'RJ - Visconde de Inhauma',
                                    'RN - Natal' => 'RN - Natal',
                                    'SC - Florianópolis' => 'SC - Florianópolis',
                                    'SE - Aracaju' => 'SE - Aracaju',
                                    'SP - 7 de abril' => 'SP - 7 de abril',
                                    'SP - Alexandre Dumas' => 'SP - Alexandre Dumas',
                                    'SP - Brigadeiro Galvão' => 'SP - Brigadeiro Galvão',
                                    'SP - Rochaverá' => 'SP - Rochaverá',
                                    'SP - Alphaville' => 'SP - Alphaville',
                                    'SP - Villa Lobos' => 'SP - Villa Lobos',
                                    'SP - Campinas' => 'SP - Campinas'
                                );
                                arsort($escritorios);
                                echo form_dropdown('escritorio', $escritorios, set_value('escritorio'), $options);
                                ?>
                            </div>
                        </div>
                    </div>
                </div><!--destaque personalizado-->

                <div class="col-lg-12 text-center">
                    <div class="aceite">
                        <label style="font-size: 9px"><input id="aceite" type="checkbox" name="aceite"> Li e aceito o regulamento</label>
                    </div>
                    <input type="submit" id="participar" name="participar" class="btn btn-lg btn-success" value="Participar!">
                </div>
                </form>
            </div>
        </div>
    </div>
</div><!--content-->