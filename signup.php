<?php
$custom='<link rel="stylesheet" href="css/custom.css">';
include('header.php');
?>
 <div id="fullscreen_bg" class="fullscreen_bg">
 <form class="form-signin" method="post" style="margin: inherit;margin-top: 80px;">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
        <div class="panel panel-primary">
        
            <h3 class="text-center">
                        Create Account</h3>
        
        <div class="panel-body">   
        
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" class="form-control" name="username" placeholder="username" />
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="text" class="form-control" name='useremail' placeholder="Email"  />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name='password1' class="form-control" placeholder="New Password" />
                        </div>
                    </div>
					
								<div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name='password2' class="form-control" placeholder="Confirm Password" />
                        </div>
                    </div>
                        <input class="btn btn-lg btn-primary btn-block" type="submit" value='Create' name='save'>
      </div>
       </div>
        </div>
    </div>
</div>
</form>
<?php
include('footer.php');
?>