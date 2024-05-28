<?php

namespace App\enum;

enum ApprovalStatusIssueReport: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
