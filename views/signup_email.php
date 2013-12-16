<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<style>
	body {
		color: #000000;
		font-size: 16px;
		font-style: normal;
		font-weight: normal;
		font-family: Helvetica, Arial, sans-serif;
		background-image: url("http://p2.kolbasification.biz/media/texture.png");
		background-origin: padding-box;
		background-size: auto;
		background-attachment: scroll;
		background-clip: border-box;
	}

	}
	</style>
	
</head>

<body>

	 Dear <?=htmlentities($name, ENT_QUOTES, 'UTF-8')?>,
<br><br>

	 This is the confirmation letter of your registration to Sblog. 
	 <br>

	 To activate your account please follow the <a href=<?=$activation_link?> >activation link</a>. 
<br><br>
	 Sincerely yours,<br>
	 SBlog administration team.
	
</body>
</html>