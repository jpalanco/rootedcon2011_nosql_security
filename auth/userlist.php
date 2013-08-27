<?php
/*
array (
  'username' => 'root',
  'passwd' => '1234',
  'mail' => 'root@localhost',
)
*/

if($_GET['action'] = "view")
{
  
  

}


  $m = new Mongo(); // connect
  $db = $m->selectDB("rooted");

  $collection = $db->users;

  //$results = $collection->find();

  $results = $collection->find();

  if (count($results)>0) 
  { 

    echo "<h2>Usuarios</h2>";
    foreach($results as $result)
    {
      //print_r($result);
      echo sprintf("Usuario: <a href='?action=view&user=%s'>%s</a>%s<br />",$result['username'], $result['username'], PHP_EOL);
    }

  }else{
    echo "<h1>No hay usuarios</h1>";
  } 

?>

