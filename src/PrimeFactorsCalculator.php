<?php

namespace Deg540\PHPTestingBoilerplate;

class PrimeFactorsCalculator
{
    private GetNumber $getNumber;
    private array $primos;

    /**
     * @param GetNumber $getNumber
     */
    public function __construct(GetNumber $getNumber)
    {
        $this->getNumber = $getNumber;
        $this->primos = [];
    }

    public function calculate():array{
        $number = $this->getNumber->getNumber();
        $i=2;
        while($i<=$number){
            if($number%$i==0){
                array_push($this->primos, $i);
                $number = $number/$i;
                continue;
            }
            $i++;
        }
        return $this->primos;
    }

}