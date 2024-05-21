<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IssueReportModel;

class IssueReportTable extends DataTableComponent
{
    protected $model = IssueReportModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('issue_report_id', 'asc');
        $this->setSearchFieldAttributes([

            'class' => 'rounded-lg border border-gray-300 p-2',

        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Issue report id", "issue_report_id")
                ->sortable(),
            Column::make("Reporter", "resident.full_name")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
        ];
    }
}
