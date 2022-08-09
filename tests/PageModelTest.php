<?php
$parent = dirname(dirname(__FILE__));
require_once $parent.'/models/PageModel.php';
require_once $parent.'/StaticUtilClass.php';

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