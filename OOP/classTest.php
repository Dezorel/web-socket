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

//class Animal{
//
//    private float $age;
//    public string $name;
//
//    public function __construct(string $name, float $age = 0){
//        $this->age = $age;
//        $this->name = $name;
//    }
//
//    public function Say(){
//        echo "Age = ".$this->age;
//    }
//}
//
//class Dog extends Animal{
//    public string $breed;
//    public function __construct(string $name, string $breed, int $age = 0)      //желательно - параметры по умолчанию
//                                                                                    // пихать в самый конец
//    {
//        parent::__construct($name,$age);
//        $this->breed = $breed;
//    }
//    public function Say()
//    {
//        parent::Say();          //вызывает уже существующую функцию
//        echo " || Name = ".$this->name;
//        echo " || Breed = ".$this->breed;
//        echo "\n";
//    }
//}
//
//$tax = new Dog(breed:'taxa',age: 2,name: 'Alex');
//$tax->Say();
//
//$buldog = new Dog(age: 3,name:'Semion', breed: 'buldog');
//$buldog->Say();
//
//$cat = new Animal(age: 0.5, name:'Eddy');
//$cat->Say();

//--------------------

//class MyClass{
//    const CONST_VALUE = "Какое-то значение \n";
//}
//
//class OtherClass extends MyClass{
//    public static $my_static = 'статическая переменная';
//
//    public static function doubleColon(){
//        echo parent::CONST_VALUE."\n";
//        echo self::$my_static."\n";
//    }
//}
//
//$classname = 'MyClass';
//
//echo MyClass::CONST_VALUE;
//
//OtherClass::doubleColon();


//----------------------------


abstract class MyAbstarctClass{
    abstract protected function getValue();
    public function printOut(){
        print $this->getValue();
    }
}

class TempClass extends MyAbstarctClass{

    protected function getValue()
    {
       return "Это какое-то значение";
    }
}

$classTemp = new TempClass();
$classTemp->printOut();