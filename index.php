	<?php
	include "php/dbcon.php";

	//$db = new DBConnect();
	//$db->authLogin(); // if user has logged in already then forward it to home.php

	//$message=NULL;
	if(isset($_POST['loginBtn'])){
	    $username = $_POST['username'];
	    $password = $_POST['password'];
	    

	    $stmt = mysql_query("SELECT * FROM project.register WHERE username='$username' AND password='$password'") or die(mysql_error());
	    $obj=mysql_fetch_object($stmt);
	    $num=mysql_num_rows($stmt);
	       //$stmt->execute([$username,$password]);
	        if($num > 0){
	            session_start();
	           
	                $_SESSION['userid'] = $obj->userid;
	                $_SESSION['username'] = $obj->username;                
	                $_SESSION['usertype'] = $obj->usertype;
	                if($obj->usertype =='o'){
	                 header("Location: http://localhost/lifering/ohome.php");
	             }else if($obj->usertype =='h'){
	             	header("Location: http://localhost/lifering/hhome.php");
	             }
	                	                	          	            
	            return true;
	        } else {
	            return false;
	        }
	   /* $flag = $db->login($username, $password);
	    if($flag){
	        header("Location: http://localhost/lifering/home.php");
	    } else {
	        $message = "Username of password was incorrect!";
	    }*/
	}
	$title="Login";
	include 'layout/_header.php'; 
	?>

	<div class="container index-container">
	    <div class="col-md-4">
	        <img src="assets/New Donate Life hands.jpg" class="img img-responsive">
	    </div>
	    <div class="col-md-4">
	        <?php if(isset($message)): ?>
	        <div class="alert-danger"><?= $message; ?></div>
	        <?php endif; ?>
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <div class="col-md-4">
	                    <img src="assets/security-icon.png" class="img img-responsive img-thumbnail">
	                </div>
	                <h1>Login </h1>
	            </div>
	            <div class="panel-body">
	                <form class="form-vertical" role="form" method="post" action="index.php">
	                    <div class="form-group">
	                        <input type="text" class="form-control" required="true" name="username" placeholder="Username">
	                    </div>
	                    <div class="form-group">
	                        <input type="password" required="true" class="form-control" name="password" placeholder="Password">
	                    </div>
	                    <br>
	                    <div class="form-group loginBtn">
	                        <button type="submit" name="loginBtn" class="btn btn-primary btn-sm">Login</button>
<!-- 	                        <a href="userty.php" class="btn btn-sm btn-warning">Register</a>
 -->	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	        <img src="assets/476392-donation2.jpg" class="img img-responsive">
	    </div>
	</div>

	<?php include 'layout/_footer.php'; ?>

