<?php
//Loading Autoload file 
require '../vendor/autoload.php';

class Examples
{
    function __construct() {
        // Do something 
    }
    function getData(){
        // Get database result 
        $data = [
            [
                'id' => 1, 
                'name' => 'Jon D',            
            ],
            [
                'id' => 2, 
                'name' => 'Michel N',            
            ]
        ];
        $apiKey = "Aie73v88G7&#*VDASDFUEBasdfaf"; 
        
        return \RetturnDataFormat\Response::success()->message('Data saved successfully!')
                                                     ->data($data)
                                                     ->apiKey($apiKey);                                                     
        
    }
}

$obj = new Examples();
$data = $obj->getData();
echo "<pre>"; 
// Print Array
print_r($data->toArray()); 
echo "<br />"; 

//Print Json
print_r($data->toJson()); 
echo "<br />"; 

//Print serialize
print_r($data->toSerialize()) ;

echo "</pre>"; 