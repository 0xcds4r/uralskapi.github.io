<?php
include ("../elements/header.php"); 
session_start();
?>

<?php 

function alertMessage($title, $msg)
{
	echo '<style>
@grey:   #A3ADB2;
@green:  #A4B123;
@orange: #E7B600;
@red:    #C20000;

.alerts {
  position: absolute;
  top: 120px;
  right: 30px;
  width: 400px;
  min-height: 300px;
  // background-color: rgba(0,0,0,.1);
  .alert {
    position: relative;
    border: none !important;
    margin-bottom: 8px;
    text-shadow: 0 -1px 1px rgba(0,0,0,.2);
    .icon {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      margin-left: -15px;
      width: 80px;
      text-align: center;
    }
    .copy {
      margin-left: 60px;
      padding-left: 20px;
      border-left: 1px solid rgba(255,255,255,.3);
      line-height: 1.2;
      h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
      }
      p {
        font-size: 14px;
        margin-bottom: 0;
      }
    }
    .close {
      opacity: 1;
      background-color: #eee;
      width: 30px;
      height: 30px;
      line-height: 26px;
      text-align: center;
      border-radius: 50%;
      border: 2px solid #333;
      position: absolute;
      top: 50%;
      right: -15px;
      transform: translateY(-50%);
    }
    &.alert-info {
      background-color: @grey;
      color: #eee;
      box-shadow: 0 0 20px 5px fade(@grey, 50%);
      .close {
        color: @grey;
        border-color: @grey;
      }
    }
    &.alert-success {
      background-color: @green;
      color: #eee;
      box-shadow: 0 0 20px 5px fade(@green, 50%);
      .close {
        color: @green;
        border-color: @green;
      }
    }
    &.alert-warning {
      background-color: @orange;
      color: #eee;
      box-shadow: 0 0 20px 5px fade(@orange, 40%);
      .close {
        color: @orange;
        border-color: @orange;
      }
    }
    &.alert-danger {
      background-color: @red;
      color: #eee;
      box-shadow: 0 0 20px 5px fade(@red, 30%);
      .close {
        color: @red;
        border-color: @red;
      }
    }
  }
}

.hero {
  min-height: 500px;
  background-color: #555;
}
header {
  position: relative;
  .markets {
    background-color: black;
    height: 30px;
  }
  .navbar {
    border-radius: none;
    margin-bottom: 0;
    .navbar-brand {
      padding-top: 25px;
      padding-bottom: 25px;
    }
    .navbar-nav {
      > li {
        > a {
          padding-top: 25px;
          padding-bottom: 25px;
        }
      }
    }
  }
}
</style>
<script>
	$(\'.close\').on(\'click\',function(){
  var alertBox = $(this).parent();
  alertBox.removeClass(\'bounceInRight\');
  alertBox.addClass(\'bounceOutRight\');
  alertBox.one(\'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend\', function(){
    alertBox.hide();
  });
});
</script>
<div class="alerts">
<div class="alert alert-danger animated bounceInRight">
      <div class="icon pull-left">
        <i class="fa fa-exclamation-triangle fa-2x"></i>
      </div>
      <div class="copy">
        <font size="4"> <p style="padding: 4px 4px 4px 32px;">'.$title.'</p> </font>
        <p>'.$msg.'</p>
      </div>
    </div></div>';
}

if(isset($_SESSION['session'])) {
	if($_SESSION['session'] == "94377c156735b39dfa4ac607234cb87c") {
		header('Location: /dev/api/admin/edit');
		return;
	}
}

$admin_login = "sugar";
$admin_pass = "salt";

if(isset($_GET['error'])) {
	if($_GET['error'] == "0") {
		alertMessage("Авторизация не выполнена!", "Вы не авторизованы!");
	}

	if($_GET['error'] == "1") {
		alertMessage("Авторизация не выполнена!", "Неправильный логин или пароль!");
	}
}

if(isset($_GET['login']) && isset($_GET['pass']) && isset($_GET['hash']))
{
	if($_GET['login'] == $admin_login)
	{
		if($_GET['pass'] == $admin_pass)
		{
			if($_GET['hash'] == "d00040bd58349678a6763459016b5af3")
			{
				$_SESSION['session'] = "94377c156735b39dfa4ac607234cb87c";
				header('Location: /dev/api/admin/edit');
			}
			else
			{
				alertMessage("Авторизация не выполнена!", "Неверный хэш!");
			}
		}
		else
		{
			alertMessage("Авторизация не выполнена!", "Неверный пароль!");
		}
	}
	else
	{
		alertMessage("Авторизация не выполнена!", "Неверный логин!");
	}
}


?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<style>
/* Demo Background */
body{background:url(/images/bg/bg-6.png)}

/* Form Style */
.form-horizontal{
 background: #fff;
 padding-bottom: 40px;
 border-radius: 15px;
 text-align: center;
}
.form-horizontal .heading{
 display: block;
 font-size: 35px;
 font-weight: 700;
 padding: 35px 0;
 border-bottom: 1px solid #f0f0f0;
 margin-bottom: 30px;
}
.form-horizontal .form-group{
 padding: 0 40px;
 margin: 0 0 25px 0;
 position: relative;
}
.form-horizontal .form-control{
 background: #f0f0f0;
 border: none;
 border-radius: 20px;
 box-shadow: none;
 padding: 0 20px 0 45px;
 height: 40px;
 transition: all 0.3s ease 0s;
}
.form-horizontal .form-control:focus{
 background: #e0e0e0;
 box-shadow: none;
 outline: 0 none;
}
.form-horizontal .form-group i{
 position: absolute;
 top: 12px;
 left: 60px;
 font-size: 17px;
 color: #c8c8c8;
 transition : all 0.5s ease 0s;
}
.form-horizontal .form-control:focus + i{
 color: #00b4ef;
}
.form-horizontal .fa-question-circle{
 display: inline-block;
 position: absolute;
 top: 12px;
 right: 60px;
 font-size: 20px;
 color: #808080;
 transition: all 0.5s ease 0s;
}
.form-horizontal .fa-question-circle:hover{
 color: #000;
}
.form-horizontal .main-checkbox{
 float: left;
 width: 20px;
 height: 20px;
 background: #11a3fc;
 border-radius: 50%;
 position: relative;
 margin: 5px 0 0 5px;
 border: 1px solid #11a3fc;
}
.form-horizontal .main-checkbox label{
 width: 20px;
 height: 20px;
 position: absolute;
 top: 0;
 left: 0;
 cursor: pointer;
}
.form-horizontal .main-checkbox label:after{
 content: "";
 width: 10px;
 height: 5px;
 position: absolute;
 top: 5px;
 left: 4px;
 border: 3px solid #fff;
 border-top: none;
 border-right: none;
 background: transparent;
 opacity: 0;
 -webkit-transform: rotate(-45deg);
 transform: rotate(-45deg);
}
.form-horizontal .main-checkbox input[type=checkbox]{
 visibility: hidden;
}
.form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
 opacity: 1;
}
.form-horizontal .text{
 float: left;
 margin-left: 7px;
 line-height: 20px;
 padding-top: 5px;
 text-transform: capitalize;
}
.form-horizontal .btn{
 float: right;
 font-size: 14px;
 color: #fff;
 background: #00b4ef;
 border-radius: 30px;
 padding: 10px 25px;
 border: none;
 text-transform: capitalize;
 transition: all 0.5s ease 0s;
}
@media only screen and (max-width: 479px){
 .form-horizontal .form-group{
 padding: 0 25px;
 }
 .form-horizontal .form-group i{
 left: 45px;
 }
 .form-horizontal .btn{
 padding: 10px 20px;
 }
}
</style>

<div class="container">
 <div class="row">

 <div class="col-md-offset-3 col-md-6">
 <form class="form-horizontal">
 <span class="heading">ADMIN PANEL</span>
 <div class="form-group">
 <input type="text" class="form-control" id="adm_log" placeholder="Login">
 <i class="fa fa-user"></i>
 </div>
 <div class="form-group help">
 <i class="fa fa-lock"></i>
 <input name="adm_pas" type="password" class="form-control" id="adm_pas" placeholder="Password">
 </div>
 <div class="form-group">
 <btn onClick="authInWiki()" class="btn btn-default">ВХОД</btn>
 </div>
 </form>
 </div>

 </div><!-- /.row -->
</div><!-- /.container -->

<?php include ("../elements/footer.php"); ?>