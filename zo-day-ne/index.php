<?php
    
    include("includes/header.php");
?>
   
    <div class="container" id="slider"><!-- mở container -->
        <div class="col-md-12"><!-- mở col-md-12 -->
           
            <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- mở carousel slide(cho slide nó chuyển tới lui) -->
               
                <ol class="carousel-indicators"><!-- mở carousel-indicators -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li> <!--kích hoạt khi mở trang để chuyển slide -->
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
                </ol><!-- đóng carousel-indicators -->
               
                <div class="carousel-inner"><!-- mở carousel-inner(chèn ảnh vào slide) -->
                   
                      
                  <?php 
                   
                   $get_slides = "select * from slider LIMIT 0,1";
                   
                   $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item active'>
                       
                       <img src='admin_area/slides_images/$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   $get_slides = "select * from slider LIMIT 1,3";
                   
                   $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item'>
                       
                       <img src='admin_area/slides_images/$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   ?>
                   
                </div><!--  đóng carousel-inner -->
               
                <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- mở left carousel-control -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   <!-- bấm bên trái thì quay về slide trước đó -->
                </a><!-- đóng left carousel-control -->
               
                <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- mở right carousel-control -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   <!-- bấm bên phải thì đi tới trang tiếp theo --> 
                </a><!-- đóng right carousel-control -->
               
            </div><!-- đóng carousel slide -->
           
        </div><!-- đóng col-md-12 -->
       
    </div><!--  đóng container -->
   
    
   
    <div id="hot"> <!-- mở các sản phẩm bán chạy -->
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>
                      Sản phẩm bán chạy 
                    </h2>
                </div>
            </div>
        
        </div>
    </div> <!-- đóng các sản phẩm bán chạy -->
    <div id="content" class="container"> <!-- mở hình ảnh các sản phẩm bán chạy -->
        <div class="row">
            <?php 

                getPro();
            ?>

        </div>
    </div> <!-- đóng hình ảnh các sản phẩm bán chạy -->
    <?php
        include("includes/footer.php");
    ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
   
</body>
</html>