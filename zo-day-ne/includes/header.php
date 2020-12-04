<?php 

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from products_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>5theway</title> <!-- tiêu đề trang web -->
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                    echo "Chào mừng: Khách";
                       
                   }else{
                       
                      echo "Chào mừng: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
                   
               </a>
               <a href="checkout.php">
                           
                    <?php 
                            
                        if(!isset($_SESSION['customer_email'])){
                        
                        echo "<a href='checkout.php'> Đăng nhập </a>";

                        }else{

                        echo " <a href='logout.php'> Đăng xuất </a> ";

                        }
                            
                    ?>
                            
                </a>
           </div>
       </div>
</div>       
                   



    <div id="navbar" class="navbar navbar-default"><!-- mở navbar navbar-default -->
       
        <div class="container"><!-- mở container  -->
           
            <div class="navbar-header"><!-- mở navbar-header -->
               
                <a href="index.php" class="navbar-brand home"><!--  mở navbar-brand home  -->
                   
                   <h1><b>5Theway</b></h1>
                   
                </a><!-- đóng navbar-brand home -->
               
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
                </button> <!-- nút menu hiển thị khi xem mode mobile --> 
               
                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
                </button> <!-- nút tìm kiếm -->
               
            </div><!-- đóng navbar-header -->
           
            <div class="navbar-collapse collapse" id="navigation"><!-- mở navbar-collapse collapse -->
               
                <div class="padding-nav"><!-- mở padding-nav -->
                   
                    <ul class="nav navbar-nav "><!-- mở nav navbar-nav -->
                    
                    <li class="<?php if($active=='SHOP') echo"active"; ?>">
                           <a href="shop.php">SHOP</a>
                       </li>
                       <li class="<?php if($active=='COLLECTIONS') echo"active"; ?>">
                           <a href="collections.php">COLLECTIONS</a>
                       </li>
                       
                       <li class="<?php if($active=='MY ACCOUNT') echo"active"; ?>">
                            <?php 
                                if(!isset($_SESSION['customer_email'])){

                                    echo"<a href='checkout.php'>MY ACCOUNT</a>";

                                }else{

                                    echo"<a href='customer/my_account.php?my_orders'>MY ACCOUNT</a>";
                                }
                            
                            ?>
                       </li>
                       <li class="<?php if($active=='ABOUT US') echo"active"; ?>">
                           <a href="aboutus.php">ABOUT US</a>
                       </li>
                       <li class="<?php if($active=='CONTACT') echo"active"; ?>">
                           <a href="contact.php">CONTACT</a>
                       </li>
                       <!-- các tùy chọn trong menu --> 
                    </ul><!-- đóng nav navbar-nav  -->
                   
                </div><!-- đóng padding-nav -->
                <div class="navbar-collapse collapse right"> <!-- mở navbar-collapse collapse right -->
                    <a href="cart.php" class="btn navbar-btn btn-primary right" > <!-- mở btn navbar-btn btn-primary -->
                        <i class="fa fa-shopping-cart"></i>
                        <?php

                            $id_add = getRealIpUser();

                            $select_cart = "select * from cart where id_add='$id_add'";

                            $run_cart = mysqli_query($con,$select_cart);

                            $count = mysqli_num_rows($run_cart);


                        ?>
                         <span class="badge"><?php echo $count; ?></span>
                    </a><!-- đóng btn navbar-btn btn-primary --> 
                    <!-- nút giỏ hàng -->
                </div> <!-- đóng navbar-collapse collapse right -->
                <div class="navbar-collapse collapse right"> <!-- mở navbar-collapse collapse right -->
                    <a href="account.php" class="btn navbar-btn btn-primary right"><!-- mở btn navbar-btn btn-primary -->
                        <i class="fa fa-user"></i>
                    </a> <!-- đóng btn navbar-btn btn-primary --> 
                   <!-- nút đăng nhập tài khoản -->
                </div> <!-- đóng navbar-collapse collapse right -->
               
               
                <div class="navbar-collapse collapse right"><!-- mở navbar-collapse collapse right -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- mở btn btn-primary navbar-btn -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- đóng btn btn-primary navbar-btn  -->
                   <!-- nút tìm kiếm -->
                </div><!-- đóng navbar-collapse collapse right -->
               
                <div class="collapse clearfix" id="search"><!-- mở collapse clearfix -->
                   
                    <form method="get" action="results.php" class="navbar-form"><!-- mở navbar-form -->
                       
                        <div class="input-group"><!-- mở input-group -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                            <span class="input-group-btn"><!-- mở input-group-btn -->
                           
                                <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- mở btn btn-primary -->
                               
                                    <i class="fa fa-search"></i>
                               
                                </button><!-- đóng btn btn-primary -->
                           
                            </span><!-- đóng input-group-btn -->
                           
                        </div><!-- đóng input-group -->
                       
                    </form><!-- đóng navbar-form -->
                   
                </div><!-- đóng collapse clearfix -->
               
            </div><!--  đóng navbar-collapse collapse -->
           
        </div><!-- đóng container  -->
       
    </div><!-- đóng navbar navbar-default --> 