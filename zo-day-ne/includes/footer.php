
<div id="footer"> <!-- mở footer -->
    <div class="container"> <!-- mở container -->
        <div class="row"> <!-- mở row -->
        <div class="col-sm-6 col-md-3">
                <h4>Hệ thống cửa hàng</h4>
                <p>
                    <strong style="font-size: large;" class="fa fa-map-marker">&nbsp;&nbsp;<b>Chi Nhánh Hồ Chí Minh</b></strong>
                    <br/>41 Quang Trung, Phường 10, Quận Gò Vấp, TP.Hồ Chí Minh
                    <br/>7 Huỳnh Khương Ninh, Phường Đakao, Quận 1, TP. Hồ Chí Minh
                    <br/>Central Market Lê Lai (Số 4 Phạm Ngũ Lão), Phường Phạm Ngũ Lão, Quận 1, TP.Hồ Chí Minh
                    <strong style="font-size: large;" class="fa fa-map-marker">&nbsp;&nbsp;<b>Chi Nhánh Biên Hòa</b></strong>
                    <br/>151A Phan Trung, Phường Tân Tiến, TP. Biên Hòa, Đồng Nai
                    <strong style="font-size: large;" class="fa fa-map-marker">&nbsp;&nbsp;<b>Chi Nhánh Cần Thơ</b></strong>
                    <br/>52 Mậu Thân Ninh Kiều - Cần Thơ
                    <strong style="font-size: large;" class="fa fa-map-marker">&nbsp;&nbsp;<b>Chi Nhánh Hà Nội</b></strong>
                    <br/>49-51 Hồ Đắc Di, Nam Đồng, Đống Đa, Hà Nội.
                    <br/>121 Phố Huế, Hai Bà Trưng, Hà Nội
                    
                </p>
                
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-sm-6 col-md-3"> <!-- mở bootstrap-->
                <h4>Chính sách</h4>
                <ul>
                    <li><a href="chinhsachgiaohang.php">Chính sách giao hàng</a></li>
                    <li><a href="chinhsachbaomat.php">Chính sách bảo mật</a></li>
                    <li><a href="chinhsachdoitra.php">Chính sách đổi trả</a></li>
                    
                </ul>
                <hr>
                <h4>Thông tin liên hệ</h4>
                <ul>
                    <li><a href=""  class="fa fa-phone">&emsp;0923953073</a></li>
                    <li><a href="mailto:buingocminhquang@gmail.com"  class="fa fa-envelope">&emsp;5theway@gmail.com</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div> <!-- đóng bootstrap-->
            <div class="col-sm-6 col-md-3">
                <h4>Danh mục</h4>
                <ul>
                    <?php 
                        $get_p_cats = "select*from products_categories";

                        $run_p_cats = mysqli_query($con,$get_p_cats);

                        while($row_p_cats = mysqli_fetch_array($run_p_cats)){

                            $p_cat_id = $row_p_cats['p_cat_id'];
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            echo"

                                <li>
                                    <a href ='shop.php?p_cat=$p_cat_id'>

                                    $p_cat_title

                                    </a> 
                                </li>


                            ";

                        }

                    ?>
                </ul>
                <hr class="hiddden-md hidden-lg">
            </div>
            
            <div class="col-sm-6 col-md-3">
                <h4>Nhận khuyến mãi mới nhất</h4>
                <p class="text-muted">
                    Điền vào email của bạn để nhận những thông báo 
                    mới nhất về khuyễn mãi 
                </p>
                <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="email">
                        <span class="input-group-btn">
                            <input type="submit" value="Đăng kí" class="btn btn-default">
                            <input type="hidden" value="5theway" name="uri"/><input type="hidden" name="loc" value="en_US"/>
                        </span>

                    </div>
                </form>
                <hr>
                <h4>Liên kết</h4>
                <p class="social">
                    <a href="https://www.facebook.com/5theway" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/5thewayvietnam/" target="_blank" class="fa fa-instagram"></a>
                    <a href="https://www.youtube.com/5THEWAY?fbclid=IwAR1vmPk0rkNg2trnDE9rLd1VYlKX_ko6EUntDitQnKs_HdIaYbxabV2qtC8" target="_blank" class="fa fa-youtube"></a>
                </p>
        </div><!-- đóng row -->
        <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="5r9zd6cT"></script> 
        <div class="fb-page" data-href="https://www.facebook.com/5theway" data-tabs="timeline" data-width="500" data-height="50" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/5theway" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/5theway">Facebook</a></blockquote></div>
    </div><!-- đóng container -->
</div><!-- đóng footer -->
<div id="copyright"><!-- mở copyright -->
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">Copyright  &copy; 2020 5theway store.</p>
        </div>
        <div class="col-md-6">
            <p class="pull-right"> &copy; Powered by <a href="#" style="color: blue;">Q2V</a></p>
        </div>
        
        
    </div>
</div><!-- đóng copyright -->
