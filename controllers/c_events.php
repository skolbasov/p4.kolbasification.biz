<?php
class events_controller extends base_controller {

public function __construct(){

parent::__construct();

if(!$this->user){
Router::redirect("/users/login");
}
}

public function index() {
	
}


public function display(){
	
	$this->template->content = View::instance('v_events_display');
	$this->template->title="New event";
	echo $this->template;

}

public function displaySchedule(){
	
	$this->template->content = View::instance('v_events_displaySchedule');
	$this->template->title="Schedule";
	echo $this->template;

}

public function p_getSchedule(){
	$q = "SELECT * FROM events WHERE user_id = '".$this->user->user_id."' AND startTime>'".Time::now()."'";
	$events = DB::instance(DB_NAME)->select_rows($q);
	echo json_encode($events);

}



public function add(){

/*$this->template->content = View::instance('v_posts_add');
$this->template->title="New Post";

echo $this->template;*/
}

public function p_add(){

	//Check if the user is logged in
if(!$this->user){
		echo("You are not logged in");
	}
	else{

		$_POST['user_id']=$this->user->user_id;

		//Check if the event already exists
		$q = "SELECT event_id FROM events WHERE user_id = '".$_POST['user_id']."' AND name='".$_POST['name']."' AND description='".$_POST['description']."'";
		
			$event_id = DB::instance(DB_NAME)->select_field($q);
		if ($event_id!=0){
		echo("Event already exists");

		}
		else{
		$event_id = DB::instance(DB_NAME)->insert('events', $_POST);
		echo("Event added successfully");
	}
	}
}




}

/*public function add(){

$this->template->content = View::instance('v_posts_add');
$this->template->title="New Post";

echo $this->template;
}

public function p_add(){
$_POST['user_id']=$this->user->user_id;
$_POST['created']=Time::now();
$_POST['modified']=Time::now();

DB::instance(DB_NAME)->insert('posts',$_POST);
Router::redirect("/");

}

public function like($post_id=NULL){

			$q = "SELECT likes FROM posts WHERE post_id = '".$post_id."'";
			$likes = DB::instance(DB_NAME)->select_field($q);
			$likes++;
			$q = "UPDATE posts SET likes='".$likes."' WHERE post_id = '".$post_id."'";
			$likes = DB::instance(DB_NAME)->query($q);
			Router::redirect("/posts");

}



public function users() {

    $this->template->content = View::instance("v_posts_users");
    $this->template->title   = "Users";

    $q = "SELECT *
        FROM users";

    $users = DB::instance(DB_NAME)->select_rows($q);

    $q = "SELECT * 
        FROM users_users
        WHERE user_id = ".$this->user->user_id;

    $connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

    $this->template->content->users       = $users;
    $this->template->content->connections = $connections;

    echo $this->template;
}


public function follow($user_id_followed){
	$data=Array(
	"created"=>Time::now(),
	"user_id"=>$this->user->user_id,
	"user_id_followed"=>$user_id_followed);
	
	DB::instance(DB_NAME)->insert('users_users',$data);
	Router::redirect("/posts/users");
}

public function unfollow($user_id_followed){
	
	$where_condition='WHERE user_id='.$this->user->user_id.' AND user_id_followed= '.$user_id_followed;
	DB::instance(DB_NAME)->delete('users_users',$where_condition);
	Router::redirect("/posts/users");
	
	
}
public function index() {
	
	$this->template->content=View::instance('v_posts_index');
	$this->template->title="All Posts";
	$q='SELECT 
			posts.post_id,
			posts.content,
			posts.created,
			posts.title,
			posts.likes,
			posts.user_id AS post_user_id,
			users_users.user_id AS follower_id,
			users.first_name,
			users.last_name
			FROM posts
			INNER JOIN users_users
				 ON posts.user_id=users_users.user_id_followed
			INNER JOIN users
				 ON posts.user_id=users.user_id
			WHERE users_users.user_id = '.$this->user->user_id;
	
	$posts=DB::instance(DB_NAME)->select_rows($q);
	$this->template->content->posts=$posts;
	echo $this->template;
}*/