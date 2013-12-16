<?php
class users_controller extends base_controller {

public function __construct(){
        parent::__construct();

}

public function index(){
Router::redirect("/posts");
}

public function login($error=NULL) {
        $this->template->content = View::instance('v_users_login');
        $this->template->content->error=$error;
        $this->template->title   = "Login page";
        echo $this->template;

}

public function p_login() {

    $_POST = DB::instance(DB_NAME)->sanitize($_POST);
    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
    $q = "SELECT user_id 
        FROM users 
        WHERE email = '".$_POST['email']."' 
        AND password = '".$_POST['password']."'";

    $user_id = DB::instance(DB_NAME)->select_field($q);

    if(!$user_id) 
    {

        Router::redirect("/users/login/error");
    } 
    else 
    {
    	$q = 'SELECT is_activated FROM users WHERE user_id = "'.$user_id.'"';
		$is_activated = DB::instance(DB_NAME)->select_field($q);
		if ($is_activated){
        	$q = "SELECT token FROM users WHERE user_id = '".$user_id."'";
			$token = DB::instance(DB_NAME)->select_field($q);
			setcookie("token", $token, strtotime('+1 year'), '/');
			Router::redirect("/posts");
    } 
    else 
    {
            Router::redirect("/users/login/error");
    }
    }

}

public function logout(){
       $new_token=sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
       $data= Array("token"=>$new_token);
       DB::instance(DB_NAME)->update("users",$data, "WHERE token ='".$this->user->token."'");
       setcookie("token","",strtotime('-1 year'),'/');
       Router::redirect("/");
}

public function profile($user_name = NULL)
    {
    if(!$this->user) 
        {
        Router::redirect('/users/login');
        }
    $this->template->content = View::instance('v_users_profile');
    $this->template->title   = "Profile of ".$this->user->first_name;
    echo $this->template;
    }

public function signup() 
    {

    $this->template->content = View::instance('v_users_signup'); 
    $this->template->title   = "Sign Up";
    echo $this->template;
    }

public function p_activate($activation_key= NULL){
        
    $q = 'SELECT user_id
        FROM users 
        WHERE activation_key = "'.$activation_key.'"';
		$user_id = DB::instance(DB_NAME)->select_field($q);
    if ($user_id!=NULL){
		//Checking the activation flag
		$q = 'SELECT is_activated
        FROM users 
        WHERE user_id = "'.$user_id.'"';
		$is_activated = DB::instance(DB_NAME)->select_field($q);
		if (!$is_activated){  
		
		//Activating the account
    	$q="UPDATE `users` SET  `is_activated` = '1' WHERE `users`.`user_id` ='".$user_id."'";
       
		DB::instance(DB_NAME)->query($q);
	     Router::redirect("/users/activate");
	    } 
	     
	     //if user is already activated(is_activated=1)
	     else {
	    	  
	    	  Router::redirect("/users/activate/error");
	    	   
              }
        } 

        else {
	    	  
	    	  Router::redirect("/users/activate/error");   	   
         }

}

public function activate($error=NULL)
    {
    
    $this->template->content = View::instance('v_users_activate');
	$this->template->content->error=$error;
    echo $this->template;

    }

public function p_signup() 
    {
        //Checking the existence of the user
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);
     $q = 'SELECT user_id
        FROM users 
        WHERE email = "'.$_POST['email'].'"';
        $user_id = DB::instance(DB_NAME)->select_field($q);
    if ($user_id!=NULL)
        {
        $error="User account already exists.";
        $this->template->content = View::instance('v_users_signup');
        $this->template->content->error=$error;
        echo $this->template;
        }
    else
            {
		
        //Inserting the user into the database
			$_POST['created']=Time::now();
			$_POST['modified']=Time::now();
			$_POST['password']=sha1(PASSWORD_SALT.$_POST['password']);
			$_POST['token']=sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
			$_POST['activation_key']=str_shuffle($_POST['password'].$POST['token']);
			$activation_link="http://".$_SERVER['SERVER_NAME']."/users/p_activate/".$_POST['activation_key'];
			$name=$_POST['first_name'];
			$name.=" ";
			$name.=$_POST['last_name'];
			$user_id = DB::instance(DB_NAME)->insert('users', $_POST);
			
		//Sending the confirmation mail
			$to[]=Array("name"=>$name, "email"=>$_POST['email']);
			$subject="Confirmation letter";
			$from=Array("name"=>APP_NAME, "email"=>APP_EMAIL);    
            $body = View::instance('signup_email');
            $body->name=$name;
            $body->activation_link=$activation_link;


			$email = Email::send($to, $from, $subject, $body, false, $cc, $bcc);
			
			Router::redirect('/');
            }    
    }

}