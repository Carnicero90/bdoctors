<?php

namespace App;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sponsorplan extends Model
{
    public function endDate( $startDate = false ) 
    {
        if ( !$startDate )
        {
            $startDate = Carbon::now();
        }
        return $startDate->addHours($this->duration_in_hours);
    }
}
