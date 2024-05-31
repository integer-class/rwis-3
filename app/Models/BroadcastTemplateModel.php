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
        'fillable_fields',
        'type',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'fillable_fields' => 'array',
    ];

    public function getFieldsAttribute($value)
    {
        return json_decode($value);
    }

    public function setFieldsAttribute($value)
    {
        $this->attributes['fillable_fields'] = json_encode($value);
    }

    public function scheduledMessages()
    {
        return $this->hasMany(ScheduledMessageModel::class, 'broadcast_template_id', 'broadcast_template_id');
    }
}
