<?php 

declare(strict_types = 1);


class Transaction{

    private float $amount;
    public  string  $description;
    

    public function __construct(float $amount, string $description)
    {
        $this->amount = $amount;
        $this->description = $description;
    }


    public function AddTax(float $rate): Transaction{
        $this->amount += $this->amount * $rate /100;
    return $this;
    }

    public function Discount(float $rate): Transaction{
        $this->amount -= $this->amount * $rate /100;
    return $this;
    }
    public function getAmount():float{
        return $this->amount;
    }
    public function __destruct(){
        echo 'desturct this'. $this->description . "<br>";
    }

}


?>