<?php

class farm{
  public $chickenAmount=[];
  public $cowAmount=[];
  private $nameArray=['Fred','Haudy','Bobby','Dustin','Beller'];
  public function __construct(){
    for ($i=1;$i<=10;$i++){
       $this->addChicken();
    }
    for ($i=1;$i<=20;$i++){
       $this->addCow();
    }
  }
  public function addCow(){
      array_push($this->cowAmount,['Корова '.$this->nameArray[rand(0,(count($this->nameArray)-1))],0]);// тип + имя/кол-во продукта/единица изм.
  }
  public function addChicken(){
      array_push($this->chickenAmount,['Курица '.$this->nameArray[rand(0,(count($this->nameArray)-1))],0]);
  }
  public function collectProd(){
      $i=0;
      while (true){
          if ($i<count($this->cowAmount)){
              $this->cowAmount[$i][1]+=rand(2,7);
          }
          if ($i<count($this->chickenAmount)){
              $this->chickenAmount[$i][1]+=rand(1,2);
          }
          $i++;
          if ($i>=count($this->chickenAmount)&& $i>=count($this->cowAmount)) break;
      }
  }
  private function output(){
      echo "Номер/ Имя/ Кол-во яиц/молока\n";
      for($i=0;$i<count($this->chickenAmount);$i++) echo $i." ".$this->chickenAmount[$i][0]." ".$this->chickenAmount[$i][1]."\n";
      echo "\n";
      for($i=0;$i<count($this->cowAmount);$i++) echo $i." ".$this->cowAmount[$i][0]." ".$this->cowAmount[$i][1]."\n";
  }
  public function countProd(){
    $this->output();
    $i=0;
    $eggSum=0;
    $milkSum=0;
    while (true){
        if ($i<count($this->cowAmount)){
            $milkSum+=$this->cowAmount[$i][1];
        }
        if ($i<count($this->chickenAmount)){
            $eggSum+=$this->chickenAmount[$i][1];
        }
        $i++;
        if ($i>=count($this->chickenAmount)&& $i>=count($this->cowAmount)){
            echo "\n";
            echo 'Всего литров молока: '. $milkSum."\n";
            echo 'Всего яиц: '.$eggSum;
            break;}
    }
  }
}

$farm= new farm();
$farm->addCow();
$farm->addChicken();
$farm->collectProd();
$farm->countProd();

?>
