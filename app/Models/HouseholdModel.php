<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdModel extends Model
{
    use HasFactory;

    protected $table = 'household';
    protected $primaryKey = 'household_id';

    protected $fillable = [
        'number_kk',
        'full_address',
        'area',
        'is_archived',
    ];

    public function resident() {
        return $this->hasMany(ResidentModel::class);
    }
}
