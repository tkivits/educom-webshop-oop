<?php
require_once '../models/PageModel.php';

use PHPUnit\Framework\TestCase;

class PageModelTest extends TestCase
{
    public function testConstructEmpty()
    {
        $result = new PageModel(null, null);
        $this->assertNotEmpty($result);
    }
}

?>