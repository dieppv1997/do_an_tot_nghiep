<?php 
  include 'inc/header.php';
  //include 'inc/slider.php';
?>
<?php
  	$login_check = Session::get('customer_login');
		   	if($login_check==false){
		   		header('location:login.php');
		   	}

 ?>

<style type="text/css">
    
    h3.payment{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;

    }
    .wrapper_method{
        text-align: center;
        width: 550px;
        margin: 0px auto;
        border: 1px solid black;
        padding: 20px;
        background: cornsilk;
    }
    .wrapper_method a{

        padding: 10px;
        background: red;
        color: #fff;
        margin-left: 20px;
    }
    .wrapper_method h3{
        margin-bottom: 20px;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="content_top">
    		<div class="heading">
    	<h3>Payment Method</h3>
    	</div>
        <div class="wrapper_method">
        <h3 class="payment">CHỌN PHƯƠNG THỨC THANH TOÁN</h3>
        <a class="payment_href"  href="paymentoffline.php">Thanh toán Offline</a>
        <a class="payment_href" href="paymentonline.php">Thanh toán Offline</a>
        </div>
    	<div class="clear"></div>
    </div>

    	
 		</div>
 	</div>
<?php 
  include 'inc/footer.php';
  
?>