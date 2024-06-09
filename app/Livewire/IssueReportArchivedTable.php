<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IssueReportModel;
use Illuminate\Database\Eloquent\Builder;

class IssueReportArchivedTable extends DataTableComponent
{
    protected $model = IssueReportModel::class;

    public function builder(): Builder
    {
        return IssueReportModel::query()
            ->where('issue_report.is_archived', true);
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
            Column::make("Pelapor", "resident.full_name")
                ->sortable()
                ->searchable(),
            Column::make("Nomor Telepon", "resident.whatsapp_number")
                ->sortable()
                ->searchable(),
            Column::make("Judul", "title")
                ->sortable()
                ->searchable(),
            Column::make("Deskripsi", "description")
                ->sortable()
                ->searchable(),
            Column::make("Status", "status")
                ->sortable()
                ->searchable(),
            Column::make('Aksi')
                ->label(fn($row) => view('components.column-action', ['id' => $row->issue_report_id, 'menu' => ['unarchive']]))
                ->html(),
        ];
    }

    public function unarchive($id)
    {
        $resident = IssueReportModel::find($id);
        $resident->is_archived = false;
        $resident->save();
        redirect('/issue/approval');
    }
}
