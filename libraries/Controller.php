<?php


namespace libraries;


interface Controller
{


    public function __construct();

    public function get_view();

    public function get_title();



    public function get_script();

    public function get_style();
}