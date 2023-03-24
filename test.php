<?php
//http:/localhost:83/web-project-2/test.php?id=1&name=john
//print_r($_SERVER);
//print_r($_SERVER['HTTP_HOST']);
print_r("test");
$ages = array("Peter" => 35, "Ben"=>37);

/*foreach ($ages as $key => $value) {
    print_r("Key " . $key . "= Value: " . $value."<br/>");
}*/

unset($ages['Peter']);

print_r($ages);

/*if($y == 3){
    $x = true;
}else {
    $x = false;
}
$x = ($y == 3) ? true : false

$x = $y == 3 ?? true
*/
?>
