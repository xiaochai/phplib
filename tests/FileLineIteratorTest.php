<?php
use Phplib\FileLineIterator;

require_once dirname(__DIR__) . '/vendor/autoload.php';

class FileLineIteratorTest extends \PHPUnit\Framework\TestCase {
    public function testFile(){
        $c = file_get_contents(__DIR__ . "/lines.txt");
        $lines = explode("\n", $c);
        if($lines[count($lines)-1] === ""){
            // 如果最后一行有一个回车，需要去掉最后一个元素
            unset($lines[count($lines)-1]);
        }

        $fi = new FileLineIterator(__DIR__ . "/lines.txt");
        $iterRes = [];
        foreach($fi as $k => $v){
            $iterRes[$k] = $v;
        }
        $this->assertEmpty(array_diff($lines, $iterRes));

        $iterRes = [];
        foreach($fi as $k => $v){
            $iterRes[$k] = $v;
        }
        $this->assertEmpty(array_diff($lines, $iterRes));
    }
}
