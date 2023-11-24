<?php

namespace Tests;

class ControllerTest extends TestCase
{
    /**
     * Test home function.
     * 
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-22
     *
     * @return void
     */
    public function testHome()
    {
        $this->get('/');

        $this->assertEquals(
            200, $this->response->status()
        );
    }
}
