<?php

/*
|--------------------------------------------------------------------------
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
|--------------------------------------------------------------------------
*/

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class dog extends Model
{
    protected $table = 'dogs';

    protected $fillable = [
        'name', 'age', 'owner', 'toys', 'created_at', 'updated_at'
    ];
}
