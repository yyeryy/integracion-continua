<?php

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\GetNumber;
use Deg540\PHPTestingBoilerplate\PrimeFactorsCalculator;
use Mockery;
use PHPUnit\Framework\TestCase;


class PrimeFactorsCalculatorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->GetNumberMock = Mockery::mock(GetNumber::class);
    }
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
    /**
     * @test
     */
    public function calculate_return_empty_prime_factors_array(){
        $this->GetNumberMock->shouldReceive('getNumber')->once()->andReturn(1);
        $primeFactorsCalculator = new PrimeFactorsCalculator($this->GetNumberMock);
        $result = $primeFactorsCalculator->calculate();
        $this->assertIsArray($result);
        $this->assertEquals([],$result);
    }

    /**
     * @test
     */
    public function calculate_return_one_length_prime_factors_array(){
        $this->GetNumberMock->shouldReceive('getNumber')->once()->andReturn(2);
        $primeFactorsCalculator = new PrimeFactorsCalculator($this->GetNumberMock);
        $result = $primeFactorsCalculator->calculate();
        $this->assertIsArray($result);
        $this->assertEquals([2],$result);
    }

    /**
     * @test
     */
    public function calculate_return_more_than_one_and_differents_prime_factors_array(){
        $this->GetNumberMock->shouldReceive('getNumber')->once()->andReturn(6);
        $primeFactorsCalculator = new PrimeFactorsCalculator($this->GetNumberMock);
        $result = $primeFactorsCalculator->calculate();
        $this->assertIsArray($result);
        $this->assertEquals([2,3],$result);
    }

    /**
     * @test
     */
    public function calculate_return_more_than_one_and_same_prime_factors_array(){
        $this->GetNumberMock->shouldReceive('getNumber')->once()->andReturn(4);
        $primeFactorsCalculator = new PrimeFactorsCalculator($this->GetNumberMock);
        $result = $primeFactorsCalculator->calculate();
        $this->assertIsArray($result);
        $this->assertEquals([2,2],$result);
    }
}
