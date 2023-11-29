<?php

namespace App\libraries;

class Vehicle
{

    function showMyVehicleCard($props)
    {
        return view('components/myVehicleCard', $props);
    }

    function showVehicleCard($props)
    {
        return view('components/vehicleCard', $props);
    }
}
