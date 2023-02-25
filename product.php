<?php
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        echo 'Product does not exist!';
    }
} else {
    echo 'Product does not exist!';
}



?>
<?= template_header() ?>
<section class="sec-product-detail">
    <div class="pro">
        <div class="container">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="slick-track" style="opacity: 1; ">
                        <div class="wrap-pic-w pos-relative" style="width:350px">
                            <img src="imgs/<?= $product['img'] ?>" alt="IMG-PRODUCT">

                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="imgs/<?= $product['img'] ?>" tabindex="0">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="form-group col-md-6">

                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        <?= $product['name'] ?>
                    </h4>

                    <span class="mtext-106 cl2">
                        ₹<?= $product['price'] ?>
                    </span>
                    <br><br>
                    <p style="width:100%">
                        <?= $product['description'] ?> </p>

                    <br><br>


                    <div class="flex-w  p-b-10">

                    <form action="" method="POST">
                        <input type="hidden" value="<?=$product['id']?>" name="id">
                        <input type="hidden" value="<?=$product['name']?>" name="name">
                        <input type="hidden" value="<?=$product['price']?>" name="price">
                        <input type="hidden" value="<?=$product['img']?>" name="img">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <input type="hidden" name="username" value="sahil">
                        <button type="submit" name="submit" value="submit" style="width:100px;height:40px;border:2px solid black">Add to cart</button>
                    </form>
                    <?php 
                    if(isset($_POST['submit'])) {
$id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$image=$_POST['img'];
$quantity=$_POST['quantity'];
$username=$_POST['username'];

$stmt = $pdo->prepare("INSERT INTO cart(id, name, price,image,quantity,username) VALUES (:id, :name, :price,:image, :quantity,:username)");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':image', $image);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':username', $username);
if($stmt->execute()){
    echo"<script>alert('product added successfully !!!');</script>";
}
else{
    echo"<script>alert('product already added ');</script>";
}
}?>
                    </div>
                    <button type="submit" name="submit" value="Add to cart" style="width:100px;height:40px;border:2px solid black">Buy Now</button>
                </div>
            </div>
        </div>




    </div>


    </div>
    </div>

</section>
<!-- custom js file link  -->
<script src="js/script.js"></script>

<?= template_footer() ?>