<?php
namespace Phplib;
class FileLineIterator implements  \Iterator{
    private $fh;
    private $currLineNum = 0;
    private $currLine = false;
    private $counter = 0;
    public function __construct($filename){
        $this->fh = fopen($filename, "r");
        $this->currLineNum = 0;
        $this->currLine = fgets($this->fh);
    }

    public function key(){
        return $this->currLineNum;
    }

    public function next(){
        $this->currLine = fgets($this->fh);
        $this->currLineNum++;
    }

    public function current(){
        return trim($this->currLine, "\r\n");
    }
    public function valid(){
        return (bool)$this->currLine;
    }
    public function rewind(){
        rewind($this->fh);
        $this->currLineNum = 0;
        $this->currLine = fgets($this->fh);
    }
}

