<?php
session_start();
$custom='<link rel="stylesheet" href="css/custom.css">';
include('header.php');
require_once("cp/connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["login"])){

	//1-validation
	$email = $_POST["email"];
		$password = md5($_POST["pass"]);

		if(empty($email) && empty($password))
		{
			$error="<font color='red'> fileds first</font>";	
		}
		else
		{
	//2-check user from db
	$sql="select from users where userName=$email and password=$password and active=1";
	$q=$con->prepare($sql);
	$q->execute(array("x1"=>$_POST["username"],"x2"=>$_POST["userpassword"]));
	if($q->rowcount()){
	
		$row=$q->fetch();
		if($row["role"]==1){
			//admin
			$_SESSION["user"]=$email
			$_SESSION["role"]=1;
			header("location:material-dashboard-master/pages/dashboard.php");
			header("location:index.php");
		}
		else 
		//user
		$_SESSION["user"]=$email
		$_SESSION["role"]=0;

	}else echo "<script>('wrong user or pass')</script>";
}

}
?>

 <div id="fullscreen_bg" class="fullscreen_bg">
 <form class="form-signin" method="post" style="margin: inherit;margin-top: 80px;">
<div class="container" >
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
        <div class="panel panel-primary">
        
				<h3 class="text-center">Log In</h3>
        
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
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="password" name='userpassword' class="form-control" placeholder="Password" />
			</div>
		</div>
		
			<input class="btn btn-lg btn-primary btn-block" type="submit" value='login' name='login'>
      </div>
       </div>
        </div>
    </div>
</div>
</form>
<?php
include('footer.php');
?>