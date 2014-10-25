<?php

?>


<div id="login_reg" class="row">
	<div class="col-md-12" id="login_head">
	Capture
	</div>
    <div class="col-md-6">
    	<form  class="registration_form">

  
	    	<legend>Registration Form </legend>

	    	<p>Create A new Account </p>
	    
	    	<div class="elements">
	    		<label for="fname">Firstname :</label>
	      		<input type="text" id="fname" name="fname" size="25" />
	    	</div>

	    	<div class="elements">
		    	<label for="lname">Lastname :</label>
		      	<input type="text" id="lname" name="lname" size="25" />
		    </div>

		    <div class="elements">
		      	<label for="email">E-mail :</label>
		     	<input type="text" id="email" name="email" size="25" />
		    </div>

		    <div class="elements">
		      	<label for="pword">Password :</label>
		      	<input type="password" id="pword" name="pword" size="25" />
		    </div>

		    <div class="submit">
		     	<input type="hidden" id="formsubmitted" name="formsubmitted" value="TRUE" />
		      	<input id="sub" type="button" value="Register" onclick="regSub()" />
		    </div>

		    <div class="error" id="message">
		    
		    </div>

		</form>
    		
    </div>
    
   	<div class="col-md-6">
   		<form  class="login_form">
   			<legend>Login </legend>

	   		<div class="elements">
	   			<label for="email">E-mail :</label>
	   			<input type="text" name="uname" id="login_email" value="Username" onClick="this.value='';"/><br />
	   		</div>
	   		<div class="elements">
	   			<label for="login_password">Password :</label>
	            <input type="password" id="login_password" name="login_password" value="Password"  onClick="this.value='';" /><br />
	        </div>
	        <div class="submit">
	            <input class ="sidebutton" type="button" value="Login" onclick="validLogin()"></input>
	    	</div>	

	    	<div class="error" id="message2">
		    </div>

    	</form>	
    </div>
</div>

