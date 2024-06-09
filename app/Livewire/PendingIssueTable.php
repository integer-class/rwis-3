<?php

namespace App\Livewire;

use App\Enum\ApprovalStatusIssueReport;
use App\Enum\StatusIssueReport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IssueReportModel;
use Illuminate\Database\Eloquent\Builder;

class PendingIssueTable extends DataTableComponent
{
    protected $model = IssueReportModel::class;

    public function builder(): Builder
    {
        return IssueReportModel::query()
            ->where('issue_report.is_archived', false)
            ->where('issue_report.approval_status', 'pending');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('issue_report.created_at', 'desc');
        $this->setSearchFieldAttributes(['class' => 'rounded-lg border border-gray-300 p-2']);
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "issue_report_id")->hideIf(true),

            Column::make("Tanggal", "created_at")
                ->format(fn($value) => $value->timezone('Asia/Jakarta')->translatedFormat('H:i:s, l, d M Y'))
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
                ->label(fn($row) => view('components.column-action', ['id' => $row->issue_report_id]))
                ->html(),
        ];
    }

    public function show($id)
    {
        return redirect()->route('approval.show', $id);
    }

    public function approve($id)
    {
        $issue = IssueReportModel::find($id);
        $issue->approval_status = ApprovalStatusIssueReport::Approved;
        $issue->status = StatusIssueReport::Todo;
        $issue->save();
        redirect('/issue/approval');
    }

    public function reject($id)
    {
        $issue = IssueReportModel::find($id);
        $issue->approval_status = 'rejected';
        $issue->save();
        redirect('/issue/approval');
    }
}
