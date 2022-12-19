<?php

namespace Tests\HttpTests;

use Tests\BaseTest;

class GetTokenTest extends BaseTest
{
    public function testResponse()
    {
       self::assertNotEmpty(\Tests\StaticApi::getApi()->getTokenString());
    }
}