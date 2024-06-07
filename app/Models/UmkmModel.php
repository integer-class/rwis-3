<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'umkm_id', 
        'name', 
        'address', 
        'description',
        'whatsapp_number',
        'image',
        'is_archived'  
    ];
    protected $primaryKey = 'umkm_id';
    protected $table = 'umkm';
        
}
