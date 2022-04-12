<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1>Cadastrar perguntas</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" name="cadastro" id="cadastro" action="<?php echo base_url("admin/perguntas/gravar"); ?>" class="cadastro" onsubmit="return validaForm();">

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="pergunta">Pergunta</label>
                        <textarea class="form-control required" id="pergunta" name="pergunta" rows="3" placeholder="Digite a pergunta"></textarea>
                    </div>
                </div>
                <?php 
                $item = array("A","B","C","D","E","F","G","H","I");
                for($i=0;$i<5;$i++):?>
                <div class="col-lg-9">
                    <div class="form-group">
                        <label for="resposta">Resposta <?php echo $item[$i]?></label>
                        <input type="text" class="form-control required" id="resposta<?php echo $item[$i]; ?>" name="resposta[]" placeholder="Resposta <?php echo $item[$i]; ?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control required" id="valor<?php echo $item[$i]; ?>" name="valor[]" value="0">
                    </div>
                </div>
                <?php endfor;?>
                <div class="row">
                    <div class="col-lg-2 col-lg-offset-5 text-center">
                        <button id="participar" type="submit" class="btn btn-lg btn-success">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>