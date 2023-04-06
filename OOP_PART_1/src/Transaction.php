<?php 
declare(strict_types = 1);
class Transaction{
    private float $amount;
    private string $description;

    public function __construct(float $amount, string $description){
        // $this refers calling object
        $this->amount  =$amount;
        $this->description =$description;
    }

    public function addTax(float $rate){
        $this->amount += $this->amount * $rate /100;
    }
    public function Discount(float $rate){
        $this->amount -= $this->amount *$rate/100;
    }

    public function getAmount():float{
        return $this->amount;
    }
}



?>