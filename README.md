# rdf - PHP Return Data Format 

This is a php package, It help to format return data of any kind of methond. If anywone need return data with some specific format, they can use it. 

## Example 
```php
class Examples
{
    function __construct() {
    }
    function getData(){
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
        $apiKey = "Aie"; 
        
        return \ReturnDataFormat\Response::success()->message('Data saved successfully!')
                                                     ->data($data)
                                                     ->apiKey($apiKey);
                                                     // Anything you can add here will be in array 
    }
}

$obj = new Examples();
$data = $obj->getData();
print_r($data->toArray()); 
print_r($data->toJson()); 
print_r($data->toSerialize()) ;
```
### Output 
```
## ARRAY
Array
(
    [result] => 1
    [message] => Data saved successfully!
    [data] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [name] => Jon D
                )

            [1] => Array
                (
                    [id] => 2
                    [name] => Michel N
                )

        )

    [apiKey] => Aie
)
## JSON
{"result":true,"message":"Data saved successfully!","data":[{"id":1,"name":"Jon D"},{"id":2,"name":"Michel N"}],"apiKey":"Aie"}

## Serialize 
a:4:{s:6:"result";b:1;s:7:"message";s:24:"Data saved successfully!";s:4:"data";a:2:{i:0;a:2:{s:2:"id";i:1;s:4:"name";s:5:"Jon D";}i:1;a:2:{s:2:"id";i:2;s:4:"name";s:8:"Michel N";}}s:6:"apiKey";s:3:"Aie";}
```

So there is not limitation to add index to array, whenever you want anything you can just add  \ReturnDataFormat\Response::success()->ANY_INDEX(ASSIGN_DATA)->ANY_INDEX(ASSIGN_DATA) .. .. So it very flexiblie to use in any kind of function. 

## Installation 
```
php composer.phar sarphp/return-data-format

OR 

composer require sarphp/return-data-format
```






