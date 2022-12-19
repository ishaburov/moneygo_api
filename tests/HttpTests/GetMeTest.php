<?php

namespace Tests\HttpTests;

use Tests\BaseTest;
use function PHPUnit\Framework\assertJson;

class GetMeTest extends BaseTest
{
    public function testResponse()
    {
       $this->assertIsString(\Tests\StaticApi::getApi()->getMe()->send()->getResult()->getEmail());
    }
}