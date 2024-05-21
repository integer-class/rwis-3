<?php

namespace App\Filament\Pages;

use App\enum\StatusIssueReport;
use App\Models\IssueReportModel;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class IssueReportKanbanBoard extends KanbanBoard
{
    protected static string $model = IssueReportModel::class;
    protected static string $statusEnum = StatusIssueReport::class;

    protected static string $recordTitleAttribute = 'title';
    protected static string $recordDescriptionAttribute = 'description';

    protected static string $recordStatusAttribute = 'status';
}
