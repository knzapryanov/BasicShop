<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/StartPageCSS.css'); ?>">
    <script async>
        function addClicked(elmnt,classN) {
            var aList = document.getElementsByTagName("a");
            for(var i = 0; i < aList.length; i++)
            {
                aList[i].className = "";
            }
            elmnt.className = classN;
        }
    </script>
</head>
<body>
<div id = "wrapper">
    <ul>
        <li>
            <a href="<?php echo base_url()?>BasicShopController/showShopStartPage" class="clicked-a">All Products</a>
        </li>
        <li>
            <a href="<?php echo base_url()?>BasicShopController/showAddProduct">Add Product</a>
        </li>
        <li>
            <a href="<?php echo base_url()?>BasicShopController/showDeleteProduct">Delete Product</a>
        </li>
        <li>
            <a href="<?php echo base_url()?>BasicShopController/showCart">Cart</a>
        </li>
        <ul style="float:right;list-style-type:none;">
            <li><a href="#about">About</a></li>
        </ul>
    </ul>
    <?php
        //print "<pre>";
        //print_r($allProductsResult);
        //print "</pre>";
        ?>
        <ul class="products-ul-header">
            <div class="center-div">
            <li class="product-li">No</li>
            <li class="product-li">Product Name</li>
            <li class="product-li">Product Description</li>
            <li class="product-li">Price</li>
            <li class="products-li-last"></li>
            </div>
        </ul>
        <?php
        foreach($allProductsResult as $productObj)
        {
            ?>
            <ul class="products-ul">
                <div class="center-div">
                <li class="product-li"><?php echo $productObj->id; ?></li>
                <li class="product-li"><?php echo $productObj->productName; ?></li>
                <li class="product-li"><?php echo $productObj->productDesc; ?></li>
                <li class="product-li"><?php echo $productObj->productPrice; ?>$</li>
                <li class="products-li-last">
                    <?php
                    $currentProductId = $productObj->id;
                    ?>
                    <form action="<?php echo base_url('BasicShopController/addToCart/' . $currentProductId); ?>" method="post">
                        <input class="qty-field" name="addToCartQty" type="text" placeholder="Qty" />
                        <input type="image" src="<?php echo base_url();?>assets/images/add-to-cart-7.gif" class="add-to-cart-button" />
                    </form>
                </li>
                </div>
            </ul>
            <?php
        }
    ?>
</div>
</body>
</html>