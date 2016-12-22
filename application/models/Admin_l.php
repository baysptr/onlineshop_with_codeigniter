<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_l
 *
 * @author baysptr
 */
class Admin_l extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function meta() {
        $html = '<html>
    <head>
        <title>bunkabook | admin</title>
        <meta charset="UTF-8">
        <meta name="description" content="Online Shop Bunkabook">
        <meta name="keywords" content="Bunka_book,shop,online_shop">
        <meta name="author" content="Baysptr">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="' . base_url() . 'bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="' . base_url() . 'bower_components/bootstrap/dist/css/dashboard.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" type="image/png" href="'.base_url().'uploads/planner.ico"/>
    </head>
    <body>';
        echo $html;
    }

    public function navbar() {
        $html = '<nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b style="color: #337ab7">B</b>unkaa <b style="color: #337ab7">B</b>ook</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="' . base_url() . 'index.php/admin/do_logout" class="btn btn-sm btn-danger"><b style="color: white">Log out</b></a></li>
                    </ul>
                </div>
            </div>
        </nav>';
        echo $html;
    }

    public function sidebar() {
        $html = '<div class="col-sm-3 col-md-2 sidebar" id="sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="'. base_url().'index.php/admin">Dashboard <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="'. base_url().'index.php/admin/banner">Banner</a></li>
                        <li><a href="'. base_url().'index.php/admin/product">Product</a></li>
                        <li><a href="'. base_url().'index.php/admin/order">Order</a></li>
                    </ul>
                </div>';
        echo $html;
    }

    public function script() {
        $html = '<script type="text/javascript" src="' . base_url() . 'bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="' . base_url() . 'bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="' . base_url() . 'bower_components/bootstrap/dist/js/holder.min.js"></script>
        <script type="text/javascript" src="' . base_url() . 'bower_components/bootbox/bootbox.js"></script>
        </body>
        </html>';
        echo $html;
    }

}
