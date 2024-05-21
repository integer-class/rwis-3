<?php

namespace App\enum;

use Mokhosh\FilamentKanban\Concerns\IsKanbanStatus;

enum StatusIssueReport: string
{

    use IsKanbanStatus;

    case Todo = 'Todo';
    case Doing = 'Doing';
    case Done = 'Done';
}
