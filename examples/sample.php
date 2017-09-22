<?php

require '../vendor/autoload.php';

$data = \RDF\Response::success()->message('Successfully Done!')->data(['apple','banna'])->key('39484')->toArray();
echo "<pre>"; 
print_r($data);
echo "</pre>"; 