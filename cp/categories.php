<?php

require_once("connect.php");

?>

<!DOCTYPE html>
<html>
<head> 
 <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/custom.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper" class="active">

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">Dashboard</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>                


    <div class="navbar-default sidebar" role="navigation">                  
        <div class="sidebar-nav">
            <ul class="nav" id="side-menu">   
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> <span class="ttspan-fill">Dashboard</span></a>
                </li>
							<li>
                    <a href="categories.php"><i class="fa fa-tasks fa-fw"></i> <span class="ttspan-fill">Categories</span></a>
                </li>
				
							<li>
                    <a href="users.php"><i class="fa fa-users fa-fw"></i> <span class="ttspan-fill">Users</span></a>
                </li>
				
							<li>
                    <a href="posts.php"><i class="fa fa-newspaper-o fa-fw"></i> <span class="ttspan-fill">Posts</span></a>
                </li>
				
							<li>
                    <a href="comments.php"><i class="fa fa-comments fa-fw"></i> <span class="ttspan-fill">Comments</span></a>
                </li>
            </ul>
        </div>
    </div>                             
</nav> 





<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class='fa fa-tasks'></i> Categories</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>	
	
			<?php
			
				if($_SERVER["REQUEST_METHOD"]=="POST"){
					
					if(empty($_POST["cname"])){
						$errors["cname"] ="<h4>Enter the name of category</h4>";
						
					}
					else{
						
						//insert
						
						$sql = "  insert into categories (name,description) values (:x1,:x2)";
						$q = $con->prepare($sql);
						$q->execute( array("x1" => $_POST["cname"] , "x2" =>$_POST["description"] ));
						
						if($q->rowcount())
						{
							echo "<h2 class='alert alert-success'>One Row Inserted</h2>";
						}
						else echo "error";
						
						
						
						}
					
					
					
				}


			?>
	
 <div id="fullscreen_bg" class="fullscreen_bg"/>
 <form class="form-signin" method="post">
	<div class="container" style='width:970px'>
    <div class="row">
        <div class="col-12-sx">
        <div class="panel panel-default">
        <div class="panel panel-primary">
        
				<h3 class="text-center"><i class='fa fa-plus-circle'></i> Add New Category</h3>
        
        <div class="panel-body">   
        
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
				</span>
				<input type="text" class="form-control" name="cname" placeholder="Name" />
			</div>
			<?php
				if(isset($errors["cname"]))echo $errors["cname"];
			
			?>
		
		</div>
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
				<textarea name="description"class="form-control"></textarea>
			</div>
		</div>
		
			<input class="btn btn-lg btn-primary btn-block" type="submit" value='Save' name='save'>
      </div>
       </div>
        </div>
    </div>
</div>
</form>
</div> 
   
    <div class="row">
        <div class="col-xs-12">           
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-tasks fa-fw"></i> Categories
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" >
                                    <thead >
											<tr >
											<th>#</th>
											<th>Name</th>
										    <th >Description</th>
										    <th >Date</th>
										    <th colspan='' style='text-align:center'>Actions</th>
                                     </tr>
                                    </thead>
                                    <tbody>
										
										<?php
										
											$sql = "select * from categories";
											$q= $con->prepare($sql);
											$q->execute();
											if($q->rowcount())
											
											{
												
												$rows = $q-> fetchall();
												foreach($rows as $row)
												{
													$id = $row["id"];
													$name = $row["name"];
													$desc = $row["description"];
													$date = $row["adddate"];
													
													echo "<tr>";
													echo "<td>$id</td>";
													echo "<td>$name</td>";
													echo "<td>$desc</td>";
													echo "<td>$date</td>";
													echo "</tr>";
													
												}
											}
			
										
										?>
										
										
										
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                       
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
          
        </div>
        <!-- /.col-lg-8 -->
       
    </div>
    <!-- /.row -->
</div>         
</div>

<script src="../js/jquery-3.1.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script>
$(function () {
    'use strict';
$('#deletej').click(function(){
    return confirm('Are You Sure!!!');
});
});
</script>
</body>
</html>