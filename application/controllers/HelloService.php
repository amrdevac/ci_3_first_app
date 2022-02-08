<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HelloService extends CI_Controller
{
    public static $helo;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('todoModel');
    }

    public function todo()
    {
        return $this->todoModel->todo();
    }

    public function subsidebar()
    {
        return $this->Hello->subsidebar();
    }

    public function sidebar()
    {
        return $this->Hello->subsidebar();
    }
}
