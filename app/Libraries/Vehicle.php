<?php

namespace App\libraries;

class Vehicle
{

    function showCard($props)
    {
        return view('components/vehicleCard', $props);
    }
}
