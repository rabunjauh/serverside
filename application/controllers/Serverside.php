<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Serverside extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Serverside_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('serverside');
    }

    public function getData()
    {
        $results = $this->Serverside_model->getDataTable();

        $data = [];
        $no = $_POST['start'];
        foreach ($results as $result) {
            $row = array();
            $row[] = ++$no;
            $row[] = $result->employeeno;
            $row[] = $result->employeename;
            $data[] = $row;
        }

        // $output = array(

        //     "data" => $data
        // );
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside_model->count_all_data(),
            "recordsFiltered" => $this->Serverside_model->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
