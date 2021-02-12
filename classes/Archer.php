<?php

class Archer extends Character
{   
    private $arrow=5;

    public function __construct($name) {
        parent::__construct($name);
        $this->damage = 15;
    }
    
    public function turn($target) {
        $rand = rand(1,2);
        if($this->arrow==0){
            return $this->attack($target);
        } else if ($rand =1 && $this->arrow>=2){
            return $this->doubleArrowAttack($target);
        } else if ($rand=2 && $this->arrow>=1){
            return $this->arrowAttack($target);
        }
    }

    public function arrowAttack($target){
        $arrowCost= 1;
        $damage= 18;
        $this->arrow-=$arrowCost; 
        $target->setHealthPoints($damage);
        $target->isAlive();
        $status = "$this->name lance une flèche sur $target->name à qui il reste $target->healthPoints points de vie ! Il reste $this->arrow flèche(s) à $this->name !";
        return $status;
    }

    public function doubleArrowAttack($target){
        $arrowCost= 2;
        $doubleDamage= 30;
        $this->arrow-=$arrowCost; 
        $target->setHealthPoints($doubleDamage);
        $target->isAlive();
        $status = "$this->name lance 2 flèches sur $target->name à qui il reste $target->healthPoints points de vie ! Il reste $this->arrow flèche(s) à $this->name !";
        return $status;
    }

    public function attack($target) {
        $target->setHealthPoints($this->damage);
        $status = "$this->name donne un coup de dague à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
}
