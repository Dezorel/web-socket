<?php

class test1{
    public $temp = 12;

    public function NewPrint(){
        $var = 7;
        echo $this->temp." | ";
        echo $var;
    }
}


$a = new test1();
$a->NewPrint();