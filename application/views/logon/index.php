<div class="row" "col-sm-12" style="background-color:lavender;">

    <div class="col-sm-4" >
      <h2>Register or Log On</h2>
	  <title><?php echo $title; ?></title>
    </div>
	 
    <div class="col-sm-4" style="background-color:#e6ccff;">
    <form id="register" action="<?=base_url("index.php/logon/index")?>" method="post">
        <fieldset>
            <legend><h2>Register Your details<h2></legend>        
				<label for="first_name"><h4>First Name</h4></label>
                <input id="first_name" class="form-control" type="text" name="first_name" value="" placeholder="First Name" required autofocus>
               
				<label for="last_name"><h4>Last name</h4></label>
				<input id="last_name" class="form-control" type="text" name="last_name" value="" placeholder="Last Name" required>
                
				<label for="email"><h4>Email</h4></label>
				<input id="email" class="form-control" type="email" name="email" value="" placeholder="example@gmail.com" required>
                
				<label for="username"><h4>Username</h4></label>
				<input id="username" class="form-control" type="text" name="username" value="" placeholder="Username" required>
               
				<label for="password"><h4>Password</h4></label>
				<input type="password" class="form-control" id="pwd"  name="pwd" placeholder="Password" required><br>
				<button type="submit" class="btn btn-default" form="register"> Register</button>         
        </fieldset>
    </form>	
   	</div>
	
    <div class="col-sm-3" style="background-color:#e6ccff;">
        <form id="login" action="<?=base_url("index.php/logon/logon")?>" method="post">
            <fieldset>
                <legend><h2>Log On</h2></legend>
					<label for="username"><h4>Username:</h4></label>
					<input class="form-control" name ="username" id="username" placeholder="Enter username" required>
                    
					<label for="pwd"><h4>Password:</h4></label>
					<input type="password" class="form-control" name ="pwd" id="pwd" placeholder="Enter password" required>
                    <br>
					<button type="submit" class="btn btn-success"  form="login"> Submit</button>				
            </fieldset>
        </form>
    </div>
</div>

<script type ="text/javascript" src="<?=base_url("js/localStorage.js")?>"></script>