<?php
/**
 * Response class used to process all return message and make it as array, json
 * or serialize. Response class has two static methond success() or failed()
 * which will used to process all further return messages. 
 *
 * @package ResponseDataFormat
 * @author Sarwar Hossain <bdsarwar@gmail.com> 
 * @copyright   2017 Sarwar Hossain
 * @license http:// name
 * @link URL description
 * @version 1.0.0
 * 
 */
namespace ReturnDataFormat;

require_once 'config.php';


/**
 * Response Class The follwoign way we used this calss
 * Usages: in caase of success 
 * $data = ['banana', 'apple'], $key = 24419;
 * $response = \ReturnDataFormat\Response::success()->data($data)->key($key)->message('Saved successfully')->toArray();
 * print_r($response); // The following output will be showing
 * [
 *  'result' => true, 
 *  'message' => 'Saved successfully', 
 *  'data' => ['banna', 'apple'], 
 *  'key' => 24419
 * ]
 * If you use toJson() the above will show as json format. 
 
 * 
 */
class Response
{
    /**
     * Private variable which will keep all data settings. 
     * @var Array  
     */
    private $_RETURN;
        
    /**
     * Constructor 
     * @param Boolean $option Passing by success or failed methond and set it basic data format
     */
    function __construct($option) {
        $this->_RETURN = [
            RDF_RESULT =>  $option,
            RDF_MESSAGE => $option ? RDF_SUCCESS_MSG : RDF_FAILED_MSG 
        ];
    }

    /**
     * Static methond used to load the object of Response class and it will use Response::success()-> ... ... 
     * @return \ReturnDataFormat\Response Object of Response Class after setting ture value on its result class 
     * 
     */
    public static function success(){
        return new Response(true); 
    }
    
    /**
     * Static methond used to load the object of Response class and it will use Response::failed()-> ... ... 
     * @return \ReturnDataFormat\Response
     */
    public static function failed(){
        return new Response(false); 
    }
    
    /**
     * This methond used to set custom message on your returnd data set. 
     * 
     * Usage: \ReturnDataFormat\Response::success()->message('Success message'); 
     * 
     * @param type $msg
     * @return \ReturnDataFormat\Response Response Object 
     */
    public function message($msg = null){        
        $this->_RETURN[RDF_MESSAGE] = $msg; 
        return $this; 
    }

    /**
     * Magic method for indexing the return data array
     *
     * For example: \ReturnDataFormat\Response::success()->data($data)->key($key) would give you the folowing array in response 
     * if it response as toArray()
     *  [
     *      'data' => $data
     *      'key' => $key
     *  ]
     * if its toJson then it will return as json format 
     * 
     * 
     * Note the methond name is always the key and parameter is the value 
     *
     * @param string $name metond name which will use as key of return array 
     * @param array $args Parameters to pass when calling \ReturnDataFormat\Response::success()->data($data).
     * @return \ReturnDataFormat\Response Response object 
     * @throws \Exception If missing parament/arg.
     */    
    public function __call($name, $args) {
        
        if(count($args) < 1){
            throw new \Exception("Parameter missing in ".$name);
        }

        $this->_RETURN[$name] = $args[0];
        return $this; 
    }

    /**
     * Returns a json format of existing array.
     *
     * @param option $option it a format you can give to conver json data it might be JSON_HEX_TAG,  JSON_HEX_AMP, JSON_HEX_APOS, JSON_NUMERIC_CHECK, JSON_PRETTY_PRINT, JSON_UNESCAPED_SLASHES, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE
     * @return string json
     */
    public function toJson($option = JSON_NUMERIC_CHECK){
        return json_encode($this->_RETURN, $option);
    }
    
    /**
     * Returns an array with all the visible properties which set in $_RETURN
     *
     * @return array
     */
    public function toArray(){
        return $this->_RETURN;
    }
    /**
     * Returns a serialize format of existing array.
     * @return String serialize of $_RETURN Array 
     */
    public function toSerialize(){
        return serialize($this->_RETURN);
    }
}