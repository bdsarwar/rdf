<?php

use PHPUnit\Framework\TestCase;
use RetturnDataFormat\Response;

class ResponseTest extends TestCase{
	
    public function testSuccessReponseObj(){
        $this->assertInstanceOf(
                Response::class, 
                Response::success()
                );
    }
    public function testFailedReponseObj(){
        $this->assertInstanceOf(
                Response::class, 
                Response::failed()
                );
    }
	
}