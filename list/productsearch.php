<form action="">
Precio menor que: <input name=price value="" /> euros<br />
<input type="hidden" name="action" value="search" />
<button>Buscar</button>
</form>

<?php
  // http://172.16.163.129/mongodb/list/productsearch.php?price=1%20||%20this.quantity%3E0%20&action=search

 
  $m = new Mongo(); // connect
  $db = $m->selectDB("rooted");

  $collection = $db->products;


  if($_GET['action'] == "search")
  {
    

    $js = "function() { return this.price < " . $_GET['price'] . " ; }";


    $results = $collection->find(array('$where' => $js));

    foreach($results as $result)
    {
      echo sprintf("Product: %s, Price: %s, Quantity:%s%s<br />", $result['name'], $result['price'], $result['quantity'], PHP_EOL);
    }

  }

?>

