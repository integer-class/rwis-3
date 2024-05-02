<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashMutationModel extends Model
{
    use HasFactory;

    protected $table = 'cash_mutation';
    protected $primaryKey = 'cash_mutation_id';

    protected $fillable = [
        'cash_mutation_code',
        'account_debit_id',
        'debit',
        'account_credit_id',
        'credit',
        'description',
        'created_at',
    ];

    public function accountDebit() {
        return $this->belongsTo(AccountModel::class, 'account_debit_id', 'account_id');
    }

    public function accountCredit() {
        return $this->belongsTo(AccountModel::class, 'account_credit_id', 'account_id');
    }
}
