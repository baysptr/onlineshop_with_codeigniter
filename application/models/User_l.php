<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_l
 *
 * @author baysptr
 */
class User_l extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function meta() {
        $html = '<html>
    <head>
        <title>Bunkabook | web</title>
        <meta charset="UTF-8">
        <meta name="description" content="Online Shop Bunkabook">
        <meta name="keywords" content="Bunka_book,shop,online_shop">
        <meta name="author" content="Baysptr">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="' . base_url() . 'bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="' . base_url() . 'bower_components/bootstrap/dist/css/navbar-fixed-top.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/png" href="' . base_url() . 'uploads/planner.ico"/>
    </head>
    <body>';
        echo $html;
    }

    public function navbar() {
        $html = '<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="' . base_url() . '"><b style="color: #337ab7">B</b>unkaa <b style="color: #337ab7">B</b>ook</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="' . base_url() . '">Home</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#contact">Cara Beli</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="javascript:;" data-toggle="modal" data-target="#myModal">Login</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>';
        echo $html;
    }

    public function script() {
        $html = '<script type="text/javascript" src="' . base_url() . 'bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="' . base_url() . 'bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="' . base_url() . 'bower_components/bootstrap/dist/js/bootbox.min.js"></script>
        </body>
        </html>';
        echo $html;
    }

}
