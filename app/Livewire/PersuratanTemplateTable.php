<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PersuratanTemplate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PersuratanTemplateTable extends DataTableComponent
{
    protected $model = PersuratanTemplate::class;

    public function builder(): Builder
    {
        return PersuratanTemplate::query()->where('is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('persuratan_template_id');
        $this->setDefaultSort('persuratan_template_id');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "persuratan_template_id")
                ->hideIf(true),
            Column::make("Nama Dokumen", "nama_dokumen")
                ->sortable()
                ->searchable(),
            Column::make("Jenis Surat", "jenis_surat")
                ->sortable()
                ->searchable(),
            Column::make('Aksi')
                ->label(fn($row) => view('components.column-action', ['id' => $row->persuratan_template_id, 'menu' => ['edit', 'archive', 'download']]))
                ->html(),
        ];
    }

    public function edit($persuratan_template_id)
    {
        return redirect()->route('persuratan.templates.edit', $persuratan_template_id);
    }

    public function archive($persuratan_template_id)
    {
        $persuratanTemplate = PersuratanTemplate::find($persuratan_template_id);
        $persuratanTemplate->is_archived = true;
        $persuratanTemplate->save();
    }

    public function download($persuratan_template_id): StreamedResponse
    {
        $persuratanTemplate = PersuratanTemplate::find($persuratan_template_id);
        $filePath = $persuratanTemplate->file_path;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        }

        abort(404, 'File not found.');
    }
}
