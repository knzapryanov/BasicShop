<?php

class FormDataController extends CI_Controller{

    public function index(){
        $this->load->view('FormDataView');
    }

    function submitData(){
        $this->load->model('FormDataModel');
        $userData = $this->FormDataModel->submitData();
        $this->load->view('FormDataResultView', $userData);
    }
}

?>