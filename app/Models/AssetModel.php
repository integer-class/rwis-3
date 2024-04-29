<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{
    use HasFactory;

    protected $table = 'asset';
    protected $primaryKey = 'asset_id';

    protected $fillable = [
        'household_id',
        'name',
        'is_archived',
    ];

    public function household() {
        return $this->belongsTo(HouseholdModel::class, 'household_id', 'household_id');
    }
}
