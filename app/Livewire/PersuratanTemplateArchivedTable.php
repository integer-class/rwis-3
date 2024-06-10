<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PersuratanTemplate;
use Illuminate\Database\Eloquent\Builder;

class PersuratanTemplateArchivedTable extends DataTableComponent
{
    protected $model = PersuratanTemplate::class;

    public function builder(): Builder
    {
        return PersuratanTemplate::query()
            ->where('is_archived', true);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('persuratan_template_id', 'asc');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Persuratan Template ID", "persuratan_template_id")
                ->hideIf(true),
            Column::make("Nama Dokumen", "nama_dokumen")
                ->searchable()
                ->sortable(),
            Column::make("Jenis Surat", "jenis_surat")
                ->searchable()
                ->sortable(),
            Column::make('Aksi')
                ->label(fn($row) => view('components.column-action', ['id' => $row->persuratan_template_id, 'menu' => ['unarchive']]))
                ->html(),
        ];
    }

    public function unarchive($id)
    {
        $template = PersuratanTemplate::find($id);
        $template->is_archived = false;
        $template->save();
    }
}
