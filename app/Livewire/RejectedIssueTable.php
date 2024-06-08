<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IssueReportModel;
use Illuminate\Database\Eloquent\Builder;

class RejectedIssueTable extends DataTableComponent
{
    protected $model = IssueReportModel::class;

    public function builder(): Builder
    {
        return IssueReportModel::query()
            ->where('issue_report.is_archived', false)
            ->where('issue_report.approval_status', 'rejected');
    }

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
                ->sortable()
                ->searchable(),
            Column::make("Reporter", "resident.full_name")
                ->sortable()
                ->searchable(),
            Column::make("Number Phone", "resident.whatsapp_number")
                ->sortable()
                ->searchable(),
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(fn($row) => view('column-action', ['id' => $row->issue_report_id, 'menu' => ['show']]))
                ->html(),
        ];
    }

    public function show($householdId)
    {
        return redirect()->route('issue.approval.show', $householdId);
    }

    public function archive($id)
    {
        $resident = IssueReportModel::find($id);
        $resident->is_archived = true;
        $resident->save();
    }
}
