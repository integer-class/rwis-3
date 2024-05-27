<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BroadcastTemplateModel;

class BroadcastTemplateTable extends DataTableComponent
{
    protected $model = BroadcastTemplateModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Broadcast template id", "broadcast_template_id")
                ->sortable(),
            Column::make("Text", "text")
                ->sortable(),
            Column::make("Fields", "fields")
                ->sortable(),
            Column::make("Type", "type")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
