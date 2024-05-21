<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IssueReportModel;

class IssueReportArchivedTable extends DataTableComponent
{
    protected $model = IssueReportModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Issue report id", "issue_report_id")
                ->sortable(),
            Column::make("Resident id", "resident_id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Is approved", "is_approved")
                ->sortable(),
            Column::make("Is archived", "is_archived")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
