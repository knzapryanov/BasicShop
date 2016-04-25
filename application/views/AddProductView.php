<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/AddProductCSS.css'); ?>">
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
            <a href="<?php echo base_url()?>BasicShopController/showShopStartPage">All Products</a>
        </li>
        <li>
            <a href="<?php echo base_url()?>BasicShopController/showAddProduct" class="clicked-a">Add Product</a>
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
    <div class="add-product-wrapper">
        <p>Add Product:</p>
        <form class="add-product-form" method="post" action="<?php echo base_url() ?>BasicShopController/addCurrentProduct">
            <input type="text" name="productName" placeholder="Product Name" required="true" />
            <input type="text" name="productDesc" placeholder="Product Description" required="true" />
            <input type="text" name="productPrice" placeholder="Product Price" required="true" />
            <input type="submit" value="Add" />
        </form>
    </div>
</div>
</body>
</html>