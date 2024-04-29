<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AssetModel;

class AssetArchivedTable extends DataTableComponent
{
    protected $model = AssetModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Asset id", "asset_id")
                ->sortable(),
            Column::make("Household id", "household_id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Is archived", "is_archived")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
