<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1>Responda rápido!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <form action="<?php echo site_url("quiz/gravar"); ?>" name="quiz" method="POST" id="gravar">
                <div id="container">
                    <nav>
                        <ul id="indice">
                            <?php 
                            $count = count($perguntas); 
                            for($i=1; $i<$count+1; $i++):
                            ?>
                            <li><a href="" class="indice" id="a<?php echo $i; ?>" name='p<?php echo $i; ?>'><?php echo $i; ?></a></li>
                            <?php endfor;?>
                        </ul>
                    </nav>
                    
                    <ul id="perguntas">
                        <?php
                        $i=0;
                        
                        foreach($perguntas as $pergunta):
                        $i++;
                        ?>
                        <li id="p<?php echo $i?>">
                            <?php echo $pergunta->enunciado; ?>
                            <input type="hidden" name="idPergunta<?php echo $i?>" value="<?php echo $pergunta->idPergunta; ?>">
                            <div class="form-group">
                            <?php 
                            $this->load->model('Perguntas_model');
                            $respostas = $this->Perguntas_model->selectRespostas($pergunta->idPergunta);
                            
                            foreach($respostas as $resposta):
                            ?>
                                <div class="radio">
                                    <label>
                                      <input type="radio" name="resposta<?php echo $i; ?>" id="resposta<?php echo $i; ?>" value="<?php echo $resposta->idResposta; ?>"> <?php echo $resposta->resposta; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="col-lg-offset-9 col-lg-3 text-right">
                        <button class="btn btn-lg btn-success" id="btn-next">próximo ></button>
                        <button class="btn btn-lg btn-warning" id="btn-final">FINALIZAR</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3">
            <h3>Tempo Restante</h3>
            <div class="tempo_restante">
                <span class="time"><?php echo $tempo; ?></span> <span><img src="<?php echo base_url('assets/images/clock.png'); ?>" /></span>
            </div>
        </div>
    </div>
</div>