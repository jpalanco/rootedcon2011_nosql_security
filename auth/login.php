<?php
/*
array(
    'username'=>'root',
    'passwd' =>'1234'
);
*/

if(isset($_GET['username']))
{

  $m = new Mongo(); // connect
  $db = $m->selectDB("rooted");

  $collection = $db->users;

  //$results = $collection->find();

  $user = $collection->findOne(array(
    "username" => $_GET['username'],
    "passwd" => $_GET['passwd']
  ));

  if (count($user)>0) 
  { 
    die("Bienvenido $user[username]");
    //print_r($user);
  }else{
    echo "<h1>Usuario incorrecto!!!</h1>";
  } 
}

?>

<form action="">
u:<input type="text" name="username" value="" /><br />
p:<input type="password" name="passwd" value="" /><br />
<button>Login</button>
</form>


