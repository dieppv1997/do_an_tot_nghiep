<?php 
  include 'inc/header.php';
  //include 'inc/slider.php';
?>
<?php
 if(isset($_GET['orderid'])&& $_GET['orderid']=='order'){
        $customer_id = Session::get('customer_id');
        $date_order = Session::get('date_order');
        $date_return = Session::get('date_return');
        $insertOrder = $ct->insertOrder($customer_id,$date_order,$date_return);
        $del_cart  = $ct->del_all_data_cart();
        header('Location:success.php');
    } 
   
 
?> 
<style type="text/css">
	.box_left{
		width: 47%;
		border: 1px solid black;
		float: left;
		padding: 2px;
	}
	.box_right{
		width: 47%;
		border: 1px solid black;
		float: right;
		padding: 2px
	}
	.order{
		padding: 10px 70px;
		border: none;
		background: #E46363;
		font-size: 25px;
		color: #fff;
		border-radius: 5%;
		margin:10px;
		cursor: pointer;

	}
	a.a_order{
		background: red;
		padding: 7px 20px;
		color: #fff;
		font-size: 23px;
	}

</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    			<h3>Thanh toán offline	</h3>
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
            	<div class="cartpage">
			    	
						<table class="tblone">
							<?php 
							if(isset($Update_quantily_card)){
								echo $Update_quantily_card;
							}
							?>
							<?php 
							if(isset($delete_product_cart)){
								echo $delete_product_cart;
							}
							

							?>
							<tr>
								<th width="5%">ID</th>
								<th width="15%">Tên sản phẩm</th>
								
								<th width="15%">Giá</th>
								<th width="15%">Số lượng</th>
								<th width="10%">Tổng tiền</th>
								<th width="10%">Ngày đặt</th>
								<th width="10%">Ngày trả</th>
								
							</tr>
							<?php
							$subtotal = 0;
							$i = 0;
							 $get_product_cart= $ct->get_product_cart();
							 if ($get_product_cart){
							   while ($result = $get_product_cart->fetch_assoc()) {
							 		
							 	$i++;
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								
								<td><?php echo $result['price'] ?></td>
								<td>
									<?php echo $result['quantily'] ?>	</td>
								<td>
									<?php
									$total = $result['price']*$result['quantily'];
									echo $total;
									
								?></td>
								<td><?php echo $result['date_order'] ?></td>
								<td><?php echo $result['date_return'] ?></td>
							
							</tr>
							<?php
							$subtotal += $total;

								}	
							}
							?>
							
							
						</table>
						<?php
									$check_cart = $ct->check_cart();
									if($check_cart){
									

									?>
						<table style="float:right;text-align:left; " width="40%">


							<tr>
								<th>Tổng thanh toán : </th>
								<td><?php 
									echo $subtotal;
									Session::set('sum',$subtotal);
								 ?></td>
							</tr>
							
					   </table>

					   <?php
					   	}else{
					   		echo 'Giỏ hàng trống! Shopping now!';
					   	}
					   ?>
					</div>
        	</div>
        	<div class="box_right">
            <table class="tblone">
    		<?php
    			$id = Session::get('customer_id');
    			$get_customers = $cs->show_customers($id);
    			if($get_customers){
    				while ($result = $get_customers->fetch_assoc()) {
    				
    		?>
    		<tr>
    			<td>Name</td>
    			<td>:</td>
    			<td><?php echo $result['name'] ?></td>
    		</tr>
    		<tr>
    			<td>City</td>
    			<td>:</td>
    			<td><?php echo $result['city'] ?></td>
    		</tr>
    		<tr>
    			<td>Phone</td>
    			<td>:</td>
    			<td><?php echo $result['phone'] ?></td>
    		</tr>
    		<tr>
    			<td>Country</td>
    			<td>:</td>
    			<td><?php echo $result['country'] ?></td>
    		</tr>
    		<tr>
    			<td>Zipcode</td>
    			<td>:</td>
    			<td><?php echo $result['zipcode'] ?></td>
    		</tr>
    		<tr>
    			<td>Email</td>
    			<td>:</td>
    			<td><?php echo $result['email'] ?></td>
    		</tr>
    		<tr>
    			<td>Address</td>
    			<td>:</td>
    			<td><?php echo $result['address'] ?></td>
    		</tr>

    		<tr>
    			<td colspan="3"on><a href="editprofile.php">Update profile</a></td>
    		
    		</tr>
    		<?php

    				}
    			}
    		?>
    	</table>
       		 </div>
       		 
    	</div>
 	</div>
 	<center><a href="?orderid=order" class="a_order">Đặt thuê</a></center>
 </div>
 </form>
<?php 
  include 'inc/footer.php';
  
?>