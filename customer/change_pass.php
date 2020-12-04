<h1 align="center"> Đổi mật khẩu </h1>
<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
    <label>Mật khẩu cũ : </label>
    <input type="password" name="matkhaucu" class="form-control" require>
    </div> <!-- Họ tên -->

    <div class="form-group">
    <label>Mật khẩu mới : </label>
    <input type="password" name="matkhaumoi" class="form-control" require>
    </div>  <!-- Email -->

    <div class="form-group">
    <label>Nhập lại mật khẩu mới : </label>
    <input type="password" name="nhaplaimatkhaumoi" class="form-control" require>
    </div>  <!-- số điện thoại -->

    <div class="text-center">
    <button type="submit" name="submit"  class="btn btn-primary">
        <i class="fa fa-user-md"></i> Xác nhận
    </button>
    </div>
</form>

<?php 

    if(isset($_POST['submit'])){

        $c_email = $_SESSION['customer_email'];

        $c_old_pass = $_POST['matkhaucu'];

        $c_new_pass = $_POST['matkhaumoi'];

        $c_new_pass_again = $_POST['nhaplaimatkhaumoi'];

        $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";

        $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);

        $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

        if($check_c_old_pass==0){

            echo "<script>alert('Mật khẩu cũ không đúng')</script>";

            exit();

        }

        if($c_new_pass!=$c_new_pass_again){

            echo "<script>alert('Mật khẩu mới không khớp')</script>";

            exit();

        }

        $update_c_pass = "update customers set customer_pass='$c_new_pass ' where customer_email='$c_email'";

        $run_c_pass= mysqli_query($con,$update_c_pass);

        if($run_c_pass){

            echo "<script>alert('Cập nhật mật khẩu thành công')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";

        }

    }


?>