<?php

class TemperatureConverter
{
    public function convertFromCelsiusToFahrenheit($celsius)
    {
        if (is_numeric($celsius) === false){
            // throw new Exception("La température doit être un chiffre/nombre");
            throw new InvalidArgumentException("La température doit être un chiffre/nombre");
        }
        if (is_array($celsius) === true){
            throw new InvalidArgumentException("La température doit être un chiffre/nombre");
        }
        return $celsius * 9 / 5 + 32;
    }

    public function convertFromFahrenheitToCelsius($fahrenheit)
    {
        if (is_numeric($fahrenheit) === false){
            // throw new Exception("La température doit être un chiffre/nombre");
            throw new InvalidArgumentException("La température doit être un chiffre/nombre");
        }
        if (is_array($fahrenheit) === true){
            throw new InvalidArgumentException("La température doit être un chiffre/nombre");
        }
        return ($fahrenheit - 32) * 5 / 9;
    }
}

// $essai = new TemperatureConverter();
// echo "32 degrés Fahrenheit = " . $essai->convertFromFahrenheitToCelsius(32) . " degrés Celsius\n";
// echo "32 degrés Celsius = " . $essai->convertFromCelsiusToFahrenheit(32) . " degrés Fahrenheit";
?>