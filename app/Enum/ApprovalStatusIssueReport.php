<?php

namespace App\Enum;

enum ApprovalStatusIssueReport: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
