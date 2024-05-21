<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueReportModel extends Model
{
    use HasFactory;

    protected $table = 'issue_report';
    protected $primaryKey = 'issue_report_id';

    protected $fillable = [
        'resident_id',
        'title',
        'description',
        'status',
        'is_approved',
        'is_archived',
    ];

    public function resident() {
        return $this->belongsTo(ResidentModel::class, 'resident_id', 'resident_id');
    }
}
