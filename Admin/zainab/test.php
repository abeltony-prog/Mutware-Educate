<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" href=" bootstrap-4.4.1-dist/css/bootstrap.min.css">
  <script src=" js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src=" bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>

</head>
<body>
 
 <div class="container-fluid bg">
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12"></div>
<div class="col-md-4 col-sm-4 col-xs-12">
<form class="form-container wow bounceInDown" data-wow-duration="2.5s" id="frm" action="" method="post">
    <div class="form-group">
    <label>Username :</label>
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" class="form-control" placeholder="Enter Username" name="username"></div></div>
    <div class="form-group">
    <label>Email Address :</label>
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
    <input type="email" class="form-control" placeholder="Enter Email" name="email"></div></div>
    <div class="form-group">
    <label>Password :</label>
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    <input type="Password"  class="form-control" placeholder="Enter Password"  name="pass"></div></div>
     
    <input  class="btn btn-warning btn-block" type="button" id="submit" value="Sign Up">  
</form>
</div>
<div class="col-md-4 col-sm-4 col-xs-12"></div>
</div>
</div>
<script  >
        $(document).ready(function(){
            $("#submit").click(function(){
                $.ajax({
                    url:"signinsert.php",
                    type:"post",
                    data:$("#frm").serialize(),
                    success:function(d){
                         
                        $("#frm")[0].reset();
                    }
                });
            });

        });
    </script>

</body>
</html>