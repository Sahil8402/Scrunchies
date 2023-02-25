<?php
$stmt = $pdo->prepare('SELECT * FROM products');
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?= template_header() ?>
<div class="pro">
    <div class="container">

        <div class="row isotope-grid">

            <?php foreach ($products as $product) : ?>
                <a style="color:black;text-decoration:none;font-family: " Lucida Sans";" href="index1.php?page=product&id=<?= $product['id'] ?>" class="product">


                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0" style="height:350px;">
                                <img src="imgs/<?= $product['img'] ?>" alt="IMG-PRODUCT">
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        <?= $product['name'] ?>
                                    </a>

                                    <span class="stext-105 cl3">
                                        ₹<?= $product['price'] ?>
                                    </span>
                                </div>
                                <div class="flex-r p-t-3" >
                                    <a href="#">
                                        <button class="btn btn-dark">
                                        <i class="fa fa-shopping-cart" style="font-size:20px">&nbsp;&nbsp;Add to cart</i>
                                        </button> </a>
                                </div>
                            </div>
                        </div>
                    </div>



                </a>
            <?php endforeach; ?>
        </div>

    </div>


</div>

<?= template_footer() ?>