<?php

// namespace controllers\HelloController;

defined('BASEPATH') or exit('No direct script access allowed');

class HelloController extends CI_Controller
{

    private $heloModel;
    private $response;

    public function __construct()
    {
        parent::__construct();

        require("HelloService.php");
        require("Service\ResponseService.php");

        $this->heloModel = new HelloService;
        $this->response = new ResponseService;
    }

    public function index($a, $b)
    {
        $view_params['subsidebar'] = $this->heloModel->todo();
        return $this->response->get($view_params);

        // return $this->output
        //     ->set_content_type('application/json')
        //     ->set_status_header(200)
        //     ->set_output(json_encode($view_params));
        print_r($view_params);
        die;
        // $view_params['sidebar'] = $this->heloModel->sidebar();
        $oneToMany = [];

        foreach ($view_params["sidebar"] as $key_side => $side) {
            foreach ($view_params['subsidebar'] as $key_sub => $sub) {
                if ($sub["fk_kd_sidebar"] == $key_side) {
                    $subsidebar = ["sub" => $sub];
                    $data = array_merge($side, $subsidebar);
                    $oneToMany[] = $data;
                }
            }
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($oneToMany));
    }

    public function form()
    {
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("form_validation");
        } else {
            echo $_POST['name'];
            $this->load->view('form_success');
        }
        // $this->load->view("form_validation");
    }
}
