<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledMessageModel extends Model
{
    use HasFactory;

    protected $table = 'scheduled_message';
    protected $primaryKey = 'scheduled_message_id';

    protected $fillable = [
        'broadcast_template_id',
        'sender_id',
        'receiver_id',
        'fields_values',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'fields_values' => 'array',
    ];

    public function getFieldsAttribute($value)
    {
        return json_decode($value);
    }

    public function setFieldsAttribute($value)
    {
        $this->attributes['fields_values'] = json_encode($value);
    }

    public function broadcastTemplate()
    {
        return $this->belongsTo(BroadcastTemplateModel::class, 'broadcast_template_id', 'broadcast_template_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(ResidentModel::class, 'receiver_id', 'resident_id');
    }

    public function getMessageAttribute()
    {
        $message = $this->broadcastTemplate->text;
        foreach ($this->fields_values as $key => $value) {
            $message = str_replace("{{" . $key . "}}", $value, $message);
        }
        return $message;
    }
}
