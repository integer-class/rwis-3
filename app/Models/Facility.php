<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    // Define the fillable properties
    protected $fillable = [
        'facility_id', 
        'name', 
        'address', 
        'description',
        'image',
        'is_archived' 
    ];
    protected $primaryKey = 'facility_id';

    // Define the table name explicitly if needed
    protected $table = 'facility';
}
