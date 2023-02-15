<?php
class Person{
    private $name;
    private $lastname;
    private $age;
    private $hp;
    private $mother;
    private $father;

    public function __construct($name, $lastname, $age, $mother=null, $father=null){
        $this->name = $name;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->mother = $mother;
        $this->father = $father;
    }
    public function getName(){
        return $this->name;
    }
    public function getLastname(){
        return $this->lastname;
    }
    public function getAge(){
        return $this->age;
    }
    public function getMother(){
        return $this->mother;
    }

    public function getFather(){
        return $this->father;
    }
    public function info(){
        $result = "<i>". "Имя: ".$this->name."</i><br>";
        if($this->getMother() != null) {
            $result .= "<strong>"."Имя матери: ".$this->getMother()->getName()."<br>";
            if($this->getMother()->getFather != null){
                $result .= "Имя дедушки по маминой линии: ".$this->getMother()->getFather()->getName();
            }
            if($this->getMother()->getMother() != null){
                $result .= "Имя бабушки по маминой линии: ".$this->getMother()->getMather()->getName();
            }
        }
        if($this->getFather() != null){
            $result .= "<strong>"."Имя отца: ".$this->getFather()->getName()."<br>";
            if($this->getFather()->getFather != null){
                $result .= "Имя дедушки по папиной линии: ".$this->getFather()->getFather()->getName();
            }
            if($this->getFather()->getMother() != null){
                $result .= "Имя бабушки по папиной линии: ".$this->getFather()->getMather()->getName();
            }
        }

        return $result;
    }
}
$person7 = new Person("Sergey", "Popov", 72); /*Дедушка от папы*/
$person6 = new Person("Vera", "Popova", 73); /*Бабушка от папы*/
$person5 = new Person("Nadya", "Petrova", 68); /*Бабушка от мамы*/
$person4 = new Person("Igor", "Petrov", 70); /*Дедушка от мамы*/
$person3 = new Person("Ivan", "Ivanov", 35, $person7, $person6); /*Папы*/
$person2 = new Person("Olga", "Ivanova", 40, $person5, $person4); /*Мама*/
$person1 = new Person("Alex", "Ivanov", 10, $person3, $person2); /*Сыи*/
echo $person1->info();