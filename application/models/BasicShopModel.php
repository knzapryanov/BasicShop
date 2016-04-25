<?php

class BasicShopModel extends CI_Model{

    public function __construct()
    {
        parent:: __construct();
        // below load some other libraries if needed
    }

    function getAllProducts(){

       $allProductsQuery = $this->db->get('product');
       return $allProductsQuery->result();
    }

    function addCurrentProduct(){

        $productInfo = array(
            'productName' => $_POST['productName'],
            'productDesc' => $_POST['productDesc'],
            'productPrice' => $_POST['productPrice']
        );

        $this->db->insert('product', $productInfo);
    }

    function getProductById($productId){
        $query = $this->db->get_where('product', array('id' => $productId));
        return $query->result();
    }

    function deleteProductById($productId){
        $this->db->delete('product', array('id' => $productId));
    }

    /************************* Registration/Login ***************************/

    function getData(){

        $query = $this->db->get('users');

        if($query->num_rows() <= 0){
            //show_error('database is empty');
        }
        else{
            return $query->result();
        }
    }

    function RegInsertIntoDB()
    {
        /*
        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('userName', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
        } else {
        */

        $userNameGetQuery = $this->db->get_where('users', array('userName' => $_POST['userName']));
        $isUserNameTaken = false;
        if ($userNameGetQuery->num_rows() > 0) {
            $isUserNameTaken = TRUE;
        }

        $emailGetQuery = $this->db->get_where('users', array('email' => $_POST['email']));
        $isEmailTaken = false;
        if ($emailGetQuery->num_rows() > 0) {
            $isEmailTaken = TRUE;
        }

        if ($isEmailTaken == false && $isUserNameTaken == false) {

            $userName = $_POST['userName'];
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $this->db->set('userName', $userName);
            $this->db->set('email', $email);
            $this->db->set('password', $password);
            $this->db->insert('users');
        }

        $boolsData['isUserNameTaken'] = $isUserNameTaken;
        $boolsData['isEmailTaken'] = $isEmailTaken;
        return $boolsData;
    }

    function login(){
        $isUserNameRegistered = true;
        $userNameRegisteredQuery = $this->db->get_where('users', array('userName' => $_POST['userNameLogin']));
        if ($userNameRegisteredQuery->num_rows() == 0) {
            $isUserNameRegistered = false;
        }

        /*$isEmailRegistered = true;
        $emailRegisteredQuery = $this->db->get_where('users', array('email' => $_POST['email']));
        if($emailRegisteredQuery->num_rows() == 0){
            $isEmailRegistered = false;
        }*/
        $isPasswordRight = true;
        $passwordRightQuery = $this->db->get_where('users', array('password' => $_POST['passLogin']));
        if($passwordRightQuery->num_rows() == 0){
            $isPasswordRight = false;
        }

        $isCurrentUserRegistered = true;
        $currentUserRegisteredQuery = $this->db->get_where('users', array('userName' => $_POST['userNameLogin'], 'password' => $_POST['passLogin']));
        if($currentUserRegisteredQuery->num_rows() == 0){
            $isCurrentUserRegistered = false;
        }

        $loginBools['isUserNameRegistered'] = $isUserNameRegistered;
        //$loginBools['isEmailRegistered'] = $isEmailRegistered;
        $loginBools['isPasswordRight'] = $isPasswordRight;
        $loginBools['isCurrentUserRegistered'] = $isCurrentUserRegistered;

        return $loginBools;
    }
}

?>