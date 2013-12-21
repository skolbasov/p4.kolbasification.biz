<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) {echo $title;} else {echo "Time management tool";} ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<link rel="stylesheet" href="/css/main.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script type="text/javascript" src="/js/jstz.js"></script>
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
	
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
	<script type="text/javascript" src="/js/timeManagement.js"></script>
	<?php if(isset($content)) echo $content; ?>
	
</body>
</html>