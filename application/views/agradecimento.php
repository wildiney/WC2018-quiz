<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1>Obrigado pela sua participação</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" style="min-height: 300px;">
            <p>Veja quantas respostas você acertou.</p>
            <?php 
            if($table){ 
                echo "<table class='table table-striped' style='width:100%; margin:0 auto; font-size:11px'>";
                echo $table; 
                echo "</table>";
            }
            ?>
        </div>
    </div>
</div>