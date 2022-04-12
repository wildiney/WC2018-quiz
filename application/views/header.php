<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EMPRESA | <?php echo (isset($title)) ? $title : "Quiz da copa"; ?></title>

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/layout.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 header-logo"><a href="/">empresa</a></div>
                    <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12 header-title">
                        <div class="row wrapper-title">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="quiz">QUIZ DA</span> <span class="copa">COPA&nbsp;2014</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
                        <nav class="menu" role="navigation">
                            <ul class="">
                                <li><?php echo anchor(base_url("participe"), "Participe!", ($this->uri->segment(1) == "participe") ? "class='active'" : ""); ?></li>
                                <li><?php echo anchor(base_url("ranking"), "Ranking", ($this->uri->segment(1) == "ranking") ? "class='active'" : "") ?></li>
                                <li><?php echo anchor(base_url("regulamento"), "Regulamento", ($this->uri->segment(1) == "regulamento") ? "class='active'" : ""); ?></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

