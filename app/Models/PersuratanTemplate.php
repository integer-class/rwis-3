<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersuratanTemplate extends Model
{
    use HasFactory;

    protected $table = 'persuratan_templates';
    protected $primaryKey = 'persuratan_template_id';

    protected $fillable = [
        'nama_dokumen',
        'jenis_surat',
        'file_path',
        'is_archived'
    ];
}
