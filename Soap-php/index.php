<?php
$client = new SoapClient("http://localhost:52168/coursesStream.asmx?WSDL");

//echo var_dump($client->__getFunctions()[1]);
$cam = "tobago";
echo '<ul>';
foreach($client->CoursesByLocation(array("campus"=>$cam))->CoursesByLocationResult as $sc){
    foreach($sc as $key){
        echo var_dump($key);
    }

}
echo '</ul>';


?>