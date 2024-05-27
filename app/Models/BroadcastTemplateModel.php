<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroadcastTemplateModel extends Model
{
    use HasFactory;

    protected $table = 'broadcast_template';
    protected $primaryKey = 'broadcast_template_id';

    protected $fillable = [
        'text',
        'fields',
        'type',
    ];

    protected $casts = [
        'fields' => 'array',
    ];

    public function getFieldsAttribute($value)
    {
        return json_decode($value);
    }

    public function setFieldsAttribute($value)
    {
        $this->attributes['fields'] = json_encode($value);
    }
}
