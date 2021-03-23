<?php 
  include 'inc/header.php';
 // include 'inc/slider.php';
?>
<?php
	if( isset($_GET['cardid'])){
        $cartid = $_GET['cardid'];
        $delete_product_cart = $ct->delete_product_cart($cartid);
    }

	if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['submit'])){
	 $cardId = $_POST['cardId'];
    $quantily = $_POST['quantily'];
    $date_order = $_POST['date_order'];
    $date_return = $_POST['date_return'];
    $Update_quantily_card = $ct->Update_quantily_card($quantily, $cardId);
    if($quantily<=0){
    	 $delete_product_cart = $ct->delete_product_cart($cardId);
    }
 }
		
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv = 'refresh' content='0;URL=?id=live'> ";
	}

?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng của bạn</h2>
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
								<th width="15%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="20%">Số lượng</th>
								<th width="10%">Tổng tiền</th>
								<th width="10%">Hành động</th>
								<th width="10%">Ngày thuê</th>
								<th width="10%">Ngày trả</th>
							</tr>
							<?php
							$subtotal = 0;
							 $get_product_cart= $ct->get_product_cart();
							 if ($get_product_cart){
							   while ($result = $get_product_cart->fetch_assoc()) {
							 		
							 	
							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cardId" value="<?php echo $result['cardId'] ?>"/>
										<input type="number" name="quantily" min="0" value="<?php echo $result['quantily'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
									$total = $result['price']*$result['quantily'];
									echo $total;
									
								?></td>
								<td><a href="?cardid=<?php echo $result['cardId'] ?>">Xóa</a></td>
								<td><input required="" type="date" name="date_order" value="date"/></td>
								<td><input required="" type="date" name="date_return"  value="<?php echo $result['date_return'] ?>"/></td>
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
						<table style="float:right;text-align:left;" width="40%">


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
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php 
  include 'inc/footer.php';
  
?>