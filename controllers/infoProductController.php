<?php
$product = new product();
$product->id = $_GET['id'];
$infoProduct = $product->getInfoProductById();
