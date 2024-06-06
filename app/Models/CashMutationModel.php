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
        'account_sender_id',
        'amount',
        'account_receiver_id',
        'description',
        'created_at',
    ];

    public function accountSender() {
        return $this->belongsTo(AccountModel::class, 'account_sender_id', 'account_id');
    }

    public function accountReceiver() {
        return $this->belongsTo(AccountModel::class, 'account_receiver_id', 'account_id');
    }
}
