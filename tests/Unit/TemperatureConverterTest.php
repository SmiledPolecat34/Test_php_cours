<?php

require_once ('./src/TemperatureConverter.php');

use PHPUnit\Framework\TestCase;

class TemperatureConverterTest extends TestCase{
    
        public function testConvertFromCelsiusToFahrenheit()
        {
            $converter = new TemperatureConverter();
            $this->assertEquals(32, $converter->convertFromCelsiusToFahrenheit(0));
            $this->assertEquals(212, $converter->convertFromCelsiusToFahrenheit(100));
            $this->assertEquals(98.6, $converter->convertFromCelsiusToFahrenheit(37));
            $this->assertEquals(68, $converter->convertFromCelsiusToFahrenheit(20));
            $this->assertEquals(50, $converter->convertFromCelsiusToFahrenheit(10));
            $this->assertEquals(41, $converter->convertFromCelsiusToFahrenheit(5));
            $this->assertEquals(23, $converter->convertFromCelsiusToFahrenheit(-5));
            $this->assertEquals(14, $converter->convertFromCelsiusToFahrenheit(-10));
            $this->assertEquals(5, $converter->convertFromCelsiusToFahrenheit(-15));
            $this->assertEquals(-4, $converter->convertFromCelsiusToFahrenheit(-20));
            $this->assertEquals(-13, $converter->convertFromCelsiusToFahrenheit(-25));
            $this->assertEquals(-22, $converter->convertFromCelsiusToFahrenheit(-30));
            $this->assertEquals(-31, $converter->convertFromCelsiusToFahrenheit(-35));
            $this->assertEquals(-40, $converter->convertFromCelsiusToFahrenheit(-40));
        }
    
        public function testConvertFromFahrenheitToCelsius()
        {
            $converter = new TemperatureConverter();
            $this->assertEquals(0, $converter->convertFromFahrenheitToCelsius(32));
            $this->assertEquals(100, $converter->convertFromFahrenheitToCelsius(212));
            $this->assertEquals(37, $converter->convertFromFahrenheitToCelsius(98.6));
            $this->assertEquals(20, $converter->convertFromFahrenheitToCelsius(68));
            $this->assertEquals(10, $converter->convertFromFahrenheitToCelsius(50));
            $this->assertEquals(5, $converter->convertFromFahrenheitToCelsius(41));
            $this->assertEquals(-5, $converter->convertFromFahrenheitToCelsius(23));
            $this->assertEquals(-10, $converter->convertFromFahrenheitToCelsius(14));
            $this->assertEquals(-1, $converter->convertFromFahrenheitToCelsius(5));
            $this->assertEquals(-20, $converter->convertFromFahrenheitToCelsius(-4));
            $this->assertEquals(-25, $converter->convertFromFahrenheitToCelsius(-13));
        }
}
?>