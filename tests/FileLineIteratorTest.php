<?php
use Phplib\FileLineIterator;

require_once dirname(__DIR__) . '/vendor/autoload.php';

class FileLineIteratorTest extends \PHPUnit\Framework\TestCase {
    public static function testFile(){
        $fi = new FileLineIterator(__DIR__ . "/lines.txt");
        foreach($fi as $k => $v){
            var_dump($k ,$v);
        }
    }
}
