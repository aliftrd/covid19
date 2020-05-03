<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AT_Controller extends CI_Controller
{

    protected $layout = 'index';

    // ================ Constructor ================ //

    public function __construct()
    {
        parent::__construct();
    }

    // ================ End Constructor ================ //




    // ================ Rendering Data ================ //

    public function show($page, $data = [])
    {
        $this->load->view($this->layout, compact('page', 'data'));
    }

    // ================ End rendering Data ================ //
}
