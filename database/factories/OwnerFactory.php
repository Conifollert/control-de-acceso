<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Freshwork\ChileanBundle\Rut;

class OwnerFactory extends Factory
{
    public function definition()
    {
        $random_number = rand(1000000, 25000000);
        $rut = new Rut($random_number);
        $rut = $rut->fix()->format();
        return [

            'dni'               => $rut,
            'name'              => $this->faker->name(),
            'fathers_surname'   => $this->faker->lastname(),
            'mothers_surname'   => $this->faker->lastname(),
            'phone'             => $this->faker->numberBetween($min = 300000000, $max = 900000000),
            'type_livingplace'  => 'DEPARTAMENTO',
            'number'            => $this->faker->buildingNumber(),
        ];
    }
}
