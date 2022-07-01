<?php
    session_start();
    if(!empty($_SESSION['username'])){
    header("location:index.php");  
}
?>

<!DOCTYPE html>
<html>
	<head>
	    <title>Login</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.iconify.design/2/2.2.1/iconify.js"></script>
		<link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.5/css/unicons.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css">

    </head>
	<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h2 class="mb-0 pb-3"><span>Ochii Make Up Artist </span></h2>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<!-- <label for="reg-log" class="checkbox"></label> -->
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Admin Log In</h4>
											<div class="form-group">
                                                <form name="frmLogin" action="module_login.php" method="post" class="form-signin well" id="formID" role="form">
												<input type="text" name="username" class="form-style" placeholder="Your Username"  title="Username" required autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="password" class="form-style" placeholder="Your Password" title="Password" required autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
                                                <button type="submit" class="btn mt-4" name="login" title="Login"><b>SIGN IN</b></button>
                                                </form> 
				      					</div>
			      					</div>
			      				</div>
                                  <!-- <div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Sign Up</h4>
											<div class="form-group">
												<input type="text" name="logname" class="form-style" placeholder="Your Full Name" id="logname" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<a href="#" class="btn mt-4">submit</a>
				      					</div>
			      					</div> -->
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
    <!--
    <form name="frmLogin" action="module_login.php" method="post" class="shadow form-horizontal form-signin well col-md-4 " id="formID" role="form">
	    <input    type="text" name="username" placeholder="Username" title="Username" required autofocus />
	    <input    type="password"  name="password" placeholder="Password" title="Password" required /> 
	    <button type="submit" name="login" title="Login"><b>SIGN IN</b></button> 
	</form> -->
	</body>
    
</html>
