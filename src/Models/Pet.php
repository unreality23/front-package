<?php

namespace VetNext\Front\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $guarded = [];


    protected $fillable = [
        'species_type',
        'name',
        'other_species_type',
        'weight',
        'lightest_weight',
        'heaviest_weight',
        'date_of_birth',
        'is_healthy',
        'is_all_healthy',
        'on_prescriptions',
        'any_on_prescriptions',
        'prescription_details',
        'is_lactating',
        'is_any_lactating'
    ];
}
