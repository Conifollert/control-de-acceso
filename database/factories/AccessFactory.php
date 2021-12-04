<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Freshwork\ChileanBundle\Rut;

class AccessFactory extends Factory
{
    public function definition()
    {
        $random_number = rand(1000000, 25000000);
        $rut = new Rut($random_number);
        $rut = $rut->fix()->format();
        return [
            'dni'           => $rut,
            'name'          => $this->faker->name(),
            'lastname'      => $this->faker->lastname().' '.$this->faker->lastname(),
            'date'          => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'time'          => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'tower'         => $this->faker->randomElement($array = array ('Torre 1','Torre 2','Torre 3','Torre 4','Torre 5','Torre 6')),
            'floor'         => $this->faker->randomElement($array = array ('Piso 1','Piso 2','Piso 3','Piso 4','Piso 5')),
            'number_depto'  => $this->faker->randomElement($array = array ('01','02','03','04','05','06')),
        ];
    }
}
