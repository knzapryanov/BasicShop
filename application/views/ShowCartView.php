<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ShowCartCSS.css'); ?>">
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
            <a href="<?php echo base_url()?>BasicShopController/showAddProduct">Add Product</a>
        </li>
        <li>
            <a href="<?php echo base_url()?>BasicShopController/showDeleteProduct">Delete Product</a>
        </li>
        <li>
            <a href="<?php echo base_url()?>BasicShopController/showCart" class="clicked-a">Cart</a>
        </li>
        <ul style="float:right;list-style-type:none;">
            <li><a href="#about">About</a></li>
        </ul>
    </ul>
    <?php
    foreach($this->cart->contents() as $items){
        echo "Product ID: {$items['id']}   Name: {$items['name']}   Price: {$items['price']}$  Quantity: {$items['qty']}";
        ?>
        <form action="<?php echo base_url('BasicShopController/decreaseProductQty/'); ?>" method="post" style="display:inline;">
            <input type="hidden" name="rowIdField" value="<?php echo "{$items['rowid']}" ?>" />
            <input type="hidden" name="qtyField" value="<?php echo "{$items['qty']}" ?>" />
            <input type="submit" value="Remove" class="remove-from-cart-button" />
        </form>
        <form action="<?php echo base_url('BasicShopController/increaseProducQty/'); ?>" method="post" style="display:inline;">
            <input type="hidden" name="rowIdField" value="<?php echo "{$items['rowid']}" ?>" />
            <input type="hidden" name="qtyField" value="<?php echo "{$items['qty']}" ?>" />
            <input type="submit" value="Add" class="remove-from-cart-button" />
        </form>
        <?php
        //echo "\n{$items['rowid']}";
        ?><br><?php
    }
    $totalPrice = $this->cart->total();
    echo "Total price: $totalPrice";
    ?>
</div>
</body>
</html>