<?php

//class test1{
//    public $temp = 12;
//
//    public function NewPrint(){
//        $var = 7;
//        echo $this->temp." | ";
//        echo $var;
//    }
//}
//
//
//$a = new test1();
//$a->NewPrint();

//----------------------------

class Animals{

    private int $age;
    public string $name;

    public function __construct(string $name, int $age = 0){
        $this->age = $age;
        $this->name = $name;
    }

    public function Say(){
        echo "Age = ".$this->age;
    }
}

class Dog extends Animals{
    public string $breed;
    public function __construct(string $name, string $breed, int $age = 0)
    {
        parent::__construct($name,$age,);
        $this->breed = $breed;
    }
    
}

$tax = new Dog(breed:'taxa',age: 12,name: 'Alex');
$tax->Say();