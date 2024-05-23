<?php

namespace App\enum;

enum ApprovalStatusIssueReport: string
{
    case Pending = 'Pending';
    case Approved = 'Approved';
    case Rejected = 'Rejected';
}
