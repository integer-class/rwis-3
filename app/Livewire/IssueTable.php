<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IssueReportModel;
use Illuminate\Database\Eloquent\Builder;

class IssueTable extends DataTableComponent
{
    protected $model = IssueReportModel::class;

    protected string $status = 'approved';

    public function mount(string $status)
    {
        $this->status = $status;
    }

    public function builder(): Builder
    {
        return IssueReportModel::query()
            ->where('issue_report.is_archived', false)
            ->where('issue_report.approval_status', $this->status);
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
            Column::make("ID", "issue_report_id")
                ->hideIf(true),
            Column::make("Tanggal", "created_at")
                ->format(fn($value) => $value->timezone('Asia/Jakarta')->translatedFormat('H:i:s, l, d M Y'))
                ->sortable()
                ->searchable(),
            Column::make("Pelapor", "resident.full_name")
                ->sortable()
                ->searchable(),
            Column::make("Nomor Telepon", "resident.whatsapp_number")
                ->sortable()
                ->searchable(),
            Column::make("Judul", "title")
                ->sortable()
                ->searchable(),
            Column::make('Aksi')
                ->label(fn($row) => view('components.column-action', ['id' => $row->issue_report_id, 'menu' => ['show']]))
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
