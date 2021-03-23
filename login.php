<?php 
  include 'inc/header.php';
  //include 'inc/slider.php';
?>
<?php


 if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['submit'])){
    $insertCustomers = $cs->insert_customers($_POST);
 }

?>
<?php


 if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['login'])){
    $loginCustomers = $cs->login_customers($_POST);
 }

?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đã có tài khoản</h3>
        	<p>Đăng nhập</p>
        	<?php
        	if(isset($loginCustomers)){
    			echo $loginCustomers;
    		}
        	?>

        	<form action="" method="POST" >
                	<input type="text" name="email" class="field" placeholder="Nhập email">
                    <input  type="password" name="password" class="field" placeholder="password">
                 
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input class="grey" type="submit" name="login" value="Đăng nhập"></div></div>
             </form>
                    </div>
                  <!-- <?php

                  ?> -->

    	<div class="register_account">
    		<h3>Đăng ký tài khoản mới</h3>
    		<?php
    		if(isset($insertCustomers)){
    			echo $insertCustomers;
    		}

    		?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nhập tên.." >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Quận/Huyện" >
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Nhập zipcode" >
							</div>
							<div>
								<input type="text" name="email" placeholder="Nhập email" >
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Nhập địa chỉ">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Thành Phố</option>      

							<option value="HCM">TP. Hồ Chí Minh</option>
							<option value="HN">Hà Nội</option>
							<option value="HD">Hải Dương</option>
							<option value="HP">Hải Phòng</option>
							<option value="NA">Nghệ An</option>
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Nhập số điện thoại">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="*******">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input class="grey" type="submit" name="submit" value="Tạo tài khoản"></div>
		</div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php 
  include 'inc/footer.php';
  
?>