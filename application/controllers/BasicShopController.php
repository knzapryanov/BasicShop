<?php

class BasicShopController extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();

        $this->load->library('cart');
    }

    public function showShopStartPage(){
        $this->load->model('BasicShopModel');
        $allProducts['allProductsResult'] = $this->BasicShopModel->getAllProducts();
        $this->load->view('StartPageView', $allProducts);
    }

    public function showAddProduct(){
        $this->load->view('AddProductView');
    }

    public function showDeleteProduct(){
        $this->load->model('BasicShopModel');
        $allProducts['allProductsResult'] = $this->BasicShopModel->getAllProducts();
        $this->load->view('DeleteProductView', $allProducts);
    }

    function addCurrentProduct(){
        $this->load->model('BasicShopModel');
        $this->BasicShopModel->addCurrentProduct();
        $this->load->view('AddProductView');
    }

    function showCart(){
        $this->load->view('ShowCartView');
    }

    function addToCart($productId){

        $this->load->model('BasicShopModel');
        $selectedProduct['selectedProductResult'] = $this->BasicShopModel->getProductById($productId);

        $currentProductQty = 0;
        foreach($this->cart->contents() as $items){
            if ($items['id'] == $productId) {
                $currentProductQty = $items['qty'];
            }
        }
        
        if ($currentProductQty == 0) {
            $productData = array(
            'id'      => $selectedProduct['selectedProductResult'][0]->id,
            'qty'     => $_POST['addToCartQty'],
            'price'   => $selectedProduct['selectedProductResult'][0]->productPrice,
            'name'    => $selectedProduct['selectedProductResult'][0]->productName
            );
        }
        else{
            $productData = array(
            'id'      => $selectedProduct['selectedProductResult'][0]->id,
            'qty'     => $currentProductQty + $_POST['addToCartQty'],
            'price'   => $selectedProduct['selectedProductResult'][0]->productPrice,
            'name'    => $selectedProduct['selectedProductResult'][0]->productName
            );
        }
        
        $this->cart->insert($productData);

        $this->showShopStartPage();
    }

    function decreaseProductQty(){
        $currentProductQty = $_POST['qtyField'];
        $currentProductQty--;
        $data = array(
            'rowid' => $_POST['rowIdField'],
            'qty'   => $currentProductQty
            );
        $this->cart->update($data);
        $this->load->view('ShowCartView');
    }

    function increaseProducQty(){
        $currentProductQty = $_POST['qtyField'];
        $currentProductQty++;
        $data = array(
            'rowid' => $_POST['rowIdField'],
            'qty'   => $currentProductQty
        );
        $this->cart->update($data);
        $this->load->view('ShowCartView');
    }

    function deleteProduct($productId){
        $this->load->model('BasicShopModel');
        $this->BasicShopModel->deleteProductById($productId);
        $this->showDeleteProduct();
    }

    /**************************** Registration/Login **********************************/

    function index(){

        $this->load->model('BasicShopModel');

        $data['result'] = $this->BasicShopModel->getData();
        $data['title'] = 'SimpleLoginForm';

        $this->load->view('SimpleLoginFormView', $data);
    }

    function RegInsertIntoDB(){
        $this->load->model('BasicShopModel');
        $boolData = $this->BasicShopModel->RegInsertIntoDB();
        $this->load->view('RegistrationResultView', $boolData);
    }

    function login(){
        $this->load->model('BasicShopModel');
        $loginBools = $this->BasicShopModel->login();
        if($loginBools['isCurrentUserRegistered']){
            $this->showShopStartPage();
        }
        else{
            $this->load->view('LoginResultView', $loginBools);
        }
    }
}

?>