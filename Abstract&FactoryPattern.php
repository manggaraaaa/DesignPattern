<?php

/*
 *   MotorFactory Class
 */

abstract class AbstractMotorFactory {
    abstract function buatYamaha();
}

class ShowroomAFactory extends AbstractMotorFactory {
    private $context = "ShowroomA";
    function buatYamaha() {
        return new ShowroomMotorA;
    }
}



/*
 *   Motor Class
 */

abstract class AbstractMotor {
    abstract function getJenis();
    abstract function getType();
}

abstract class AbstractYamaha extends AbstractMotor {
    private $subject = "Yamaha";
}

class ShowroomMotorA extends AbstractYamaha {
    private $jenis;
    private $type;
    function __construct() {
        $this->jenis = 'Jupiter';
        $this->type = '125';
    }
    function getJenis() {
        return $this->jenis;
    }
    function getType() {
        return $this->type;
    }
}



/*
 *   Inisialisasi
 */

 
  $motorFactoryInstance = new ShowroomAFactory;
  testConcreteFactory($motorFactoryInstance);


  function testConcreteFactory($motorFactoryInstance)
  {
      $yamahaOne = $motorFactoryInstance->buatYamaha();
      print('Pesanan motor Yamaha pertama adalah: '.$yamahaOne->getJenis().' dengan jenis '.$yamahaOne->getType());
  }