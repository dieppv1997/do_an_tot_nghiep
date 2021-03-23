<?php 
  include 'inc/header.php';
 // include 'inc/slider.php';
?>

<?php
	$login_check = Session::get('customer_login');
	if($login_check==false){
       header('Location:login.php');
    }

?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="text-align: center; width: 100%">Chi Tiết Đơn Hàng</h2>
						<table class="tblone">
							
							<tr>
								<th width="5%%">ID</th>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="10%">Số lượng</th>
								<th width="10%">Ngày đặt</th>
								<th width="10%">Hành động</th>
								<th width="10%">Trạng thái</th>
								<th width="10%">Ngày trả</th>
							</tr>
							<?php
							 $customer_id = Session::get('customer_id');
							
							 $get_cart_ordered= $ct->get_cart_ordered($customer_id);
							 if ($get_cart_ordered){
							 	 $i= 0;
							   while ($result_or = $get_cart_ordered->fetch_assoc()) {
							 		$i++;
							 	

							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result_or['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result_or['image'] ?>" alt=""/></td>
								<td><?php echo $result_or['price'] ?></td>
								<td>
									
									<?php echo $result_or['quantily'] ?>
								</td>
								<td><?php echo $result_or['date_order'] ?></td>
								<?php 
								if($result_or['status']=='0'){


								?>
								<td><?php echo 'N/A'; ?></td>
								<?php
									}else{

								?>

								<td><a onclick="return confirm('Bạn thật sự muốn xóa ?')" href="?cardid=<?php echo $result_or['cardId'] ?>" >Xóa</a></td>

							<?php } ?>
								<td>
									<?php
										if($result_or['status'] == '0'){
											echo 'Đang xử lý';
										}else{
											echo 'Đã xử lý';
										}
									?>

								</td>
								<td><?php echo $result_or['date_return'] ?></td>
							</tr> 
							<?php
							

								}	
							}
							?>
							
							
						</table>
						

					 
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php 
  include 'inc/footer.php';
  
?>