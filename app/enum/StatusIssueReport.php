<?php

namespace App\enum;

use Mokhosh\FilamentKanban\Concerns\IsKanbanStatus;

enum StatusIssueReport: string
{

    use IsKanbanStatus;

    case Todo = 'To do';
    case InProgress = 'In Progress';
    case InReview = 'In Review';
    case Done = 'Done';

}
