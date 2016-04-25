<?php

class FormDataModel extends CI_Model{

    public function __construct()
    {
        parent:: __construct();
        // below load some other libraries if needed
    }

    function submitData(){

        /*$this->db->set('name', $_POST['name']);
        $this->db->set('age', $_POST['age']);
        $this->db->set('gender', $_POST['gender']);
        $this->db->insert('user');*/

        $userData = array(
            'name' => $_POST['name'],
            'age' => $_POST['age'],
            'gender' => $_POST['gender']
        );

        $this->db->insert('user', $userData);

        return $userData;
    }
}
?>