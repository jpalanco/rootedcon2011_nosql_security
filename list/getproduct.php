
<?php
  //view-source:http://172.16.163.129/mongodb/list/getproduct.php?ref[$regex]=.
 
  $m = new Mongo(); // connect
  $db = $m->selectDB("rooted");

  $collection = $db->products;


  if(isset($_GET['ref']))
  {
    
    echo "<h1>Informaci&oacute;n</h1>";
    $ref = $_GET['ref'];
    $results = $collection->find(array('ref' => $ref ));

    $data = array('ref' => $ref);
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
  

    foreach($results as $result)
    {
      echo sprintf("<b>Product</b>: %s, <b>Price</b>: %s, <b>Quantity</b>:%s%s<br />", $result['name'], $result['price'], $result['quantity'], PHP_EOL);
    }

  }

?>

