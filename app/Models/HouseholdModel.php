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
        'resident_id',
        'number_kk',
        'address',
        'rt',
        'rw',
        'sub_district',
        'district',
        'city',
        'province',
        'postal_code',
        'area',
        'is_archived',
    ];

    public function resident() {
        return $this->hasMany(ResidentModel::class);
    }


    public function getFullAddressAttribute()
    {
        return $this->address . ', RT ' . $this->rt . ', RW ' . $this->rw . ', Kelurahan ' . $this->sub_district . ', Kecamatan ' . $this->district . ', Kota ' . $this->city . ', Provinsi ' . $this->province . ', Kode Pos ' . $this->postal_code;
    }

    public function familyHead() {
        return $this->belongsTo(ResidentModel::class, 'resident_id', 'resident_id');
    }
}
