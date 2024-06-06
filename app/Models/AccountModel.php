<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    use HasFactory;

    protected $table = 'account';
    protected $primaryKey = 'account_id';

    protected $fillable = [
        'household_id',
        'name_account',
        'number_account',
        'balance',
    ];

    public function household() {
        return $this->belongsTo(HouseholdModel::class, 'household_id', 'household_id');
    }
}
