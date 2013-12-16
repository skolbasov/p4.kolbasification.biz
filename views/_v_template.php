<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>	
	<script type="text/javascript" src="../js/jstz.js"></script>
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	<style>
	body {
		color: #000000;
		font-size: 16px;
		font-style: normal;
		font-weight: normal;
		font-family: Helvetica, Arial, sans-serif;
		background-image: url("../media/texture.png");
		background-origin: padding-box;
		background-size: auto;
		background-attachment: scroll;
		background-clip: border-box;
	}

	.error {
		color:#FF0000;
	}
	.nav-item{
		color: rgb(215, 215, 215);
		font-size: 20px;
		font-style: normal;
		font-weight: normal;
		margin-bottom: 10px;
		margin-left: 10px;
		margin-right: 10px;
		margin-top: 10px;
		outline-color: rgb(215, 215, 215);
		outline-style: none;
		outline-width: 0px;
		padding-bottom: 7px;
		padding-left: 0px;
		padding-right: 0px;
		padding-top: 9px;
		text-align: left;
		height: 3%;
		text-decoration: none;
		vertical-align: baseline;
		width: 10%;
	}
	#menu{
		
		background-color:#000000;
		margin-left: 0px;
		margin-right: 0px;
		font-family: Helvetica, Arial, sans-serif;

	}

	.InputButton{
		font-family: Helvetica, Arial, sans-serif;
		height: 29px;
		text-decoration: none;
		vertical-align: baseline;
		width: 15%;
		font-size: 16px;

	}
	.InputField{
		width: 15%;
		font-size: 16px;

	}
	.TextEdit{
		width: 15%;
		font-size: 13px;
	}

@media screen and (max-width: 980px) {
	body {
		font-size: 14px;
		
	}
	.InputButton{
		height: 29px;
		text-decoration: none;
		vertical-align: baseline;
		width: 25%;
		font-size: 14px;

	}
	.InputField{
		width: 25%;
		font-size: 14px;

	}
	.TextEdit{
		width: 25%;
		font-size: 12px;
	}


	}

@media screen and (max-width: 480px) {
	body {
		color: #000000;
		font-size: 14px;
		background-origin: padding-box;

	}
	.InputButton{
		font-family: Helvetica, Arial, sans-serif;
		height: 29px;
		text-decoration: none;
		vertical-align: baseline;
		width: 30%;
		position: relative;
		left:35%;
		font-size: 14px;

	}
	.InputField{
		position: absolute;
		left:30%;
		width:40%;
		font-size: 14px;

	}
	.TextEdit{
		width: 40%;
		position: relative;
		left:30%;
		font-size: 12px;
		height: 30%;
	}

	.nav-item{
		font-size: 15px;
		text-align: center;
		height: 5%;
		width:20%;
	}


	}

	</style>
	
</head>

<body>	
<div id='menu'>
<?php if ($user):?>
<a href='/posts/' class="nav-item">Feed</a>
<a href='/' class="nav-item">My Posts</a>
<a href='/posts/add' class="nav-item">Add a post</a>
<a href='/posts/users' class="nav-item">Members</a>
<a href='/users/profile' class="nav-item">Profile</a>
<a href='/users/logout' class="nav-item">Logout</a>
<?php else: ?> 
<a href='/' class="nav-item">Home</a>
<a href='/users/signup' class="nav-item">Sign up</a>
<a href='/users/login' class="nav-item">Log in</a>
<?php endif; ?>

</div>

<br>

	<?php if(isset($content)) echo $content; ?>
	
</body>
</html>