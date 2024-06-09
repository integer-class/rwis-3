<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BroadcastTemplateModel;
use Illuminate\Database\Eloquent\Builder;

class BroadcastTemplateArchivedTable extends DataTableComponent
{
    protected $model = BroadcastTemplateModel::class;

    public function builder(): Builder
    {
        return BroadcastTemplateModel::query()
            ->where('broadcast_template.is_archived', true);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('broadcast_template_id', 'asc');
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
                ->label(fn($row) => view('components.column-action', ['id' => $row->broadcast_template_id, 'menu' => ['unarchive']]))
                ->html(),
        ];
    }

    public function unarchive($id)
    {
        $broadcastTemplate = BroadcastTemplateModel::find($id);
        $broadcastTemplate->is_archived = false;
        $broadcastTemplate->save();
    }
}
