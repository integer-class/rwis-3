<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BroadcastTemplateModel;
use Illuminate\Database\Eloquent\Builder;

class BroadcastTemplateTable extends DataTableComponent
{
    protected $model = BroadcastTemplateModel::class;

    public function builder(): Builder
    {
        return BroadcastTemplateModel::query()->where('broadcast_template.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('broadcast_template_id');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "broadcast_template_id")
                ->hideIf(true),
            Column::make("Teks", "text")
                ->sortable()
                ->searchable(),
            Column::make("Jenis", "type")
                ->sortable()
                ->searchable(),
            Column::make('Aksi')
                ->label(fn($row, Column $column) => view('components.column-action', ['id' => $row->broadcast_template_id, 'menu' => ['send', 'show', 'edit', 'archive']))
                ->html(),
        ];
    }

    public function show($broadcast_template_id)
    {
        return redirect()->route('broadcast.template.show', $broadcast_template_id);
    }

    public function edit($broadcast_template_id)
    {
        return redirect()->route('broadcast.template.edit', $broadcast_template_id);
    }

    public function archive($id)
    {
        $broadcastTemplate = BroadcastTemplateModel::find($id);
        $broadcastTemplate->is_archived = true;
        $broadcastTemplate->save();
    }
}
