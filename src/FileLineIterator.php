<?php
namespace Phplib;
class FileLineIterator implements  \Iterator{
    private $fh;
    private $currLineNum = 0;
    private $currLine = false;
    public function __construct($filename){
        var_dump(__METHOD__);
        $this->fh = fopen($filename, "r");
    }

    public function key(){
        var_dump(__METHOD__);
        return $this->currLineNum;
    }

    public function next(){
        var_dump(__METHOD__);
        $this->currLine = fgets($this->fh);
        var_dump($this->currLine);die;
        $this->currLine++;
        
    }

    public function current(){
        var_dump(__METHOD__);
        return $this->currLine;
    }
    public function valid(){
        var_dump(__METHOD__);
        if($fh === false || ($this->currLine !=0 && $this->currLine === false)){
            return false;
        }
        return true;
    }
    public function rewind(){
        var_dump(__METHOD__);
        $this->currLineNum = 0;
        $this->currLine = false;
    }
}

