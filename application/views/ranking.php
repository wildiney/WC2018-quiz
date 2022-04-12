<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1>Ranking</h1>
        </div>
        <div class="col-lg-12 ranking">
            <table class="table table-striped table-hover">
            <?php
                $i=1;
                foreach ($ranking as $usuario){
                    echo "<tr><td>" . $i . "</td><td>" . $usuario->nome . " " . $usuario->sobrenome .  "</td><td>" . $usuario->departamento . "</td><td>" . $usuario->escritorio .   "</td><td>" . $usuario->pontuacao . "</td></tr>";
                    $i++;
                }
            ?>
            </table>
        </div>
    </div>
</div>