<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AssetModel;
use Illuminate\Database\Eloquent\Builder;

class AssetTable extends DataTableComponent
{
    protected $model = AssetModel::class;

    public function builder(): Builder
    {
        return AssetModel::query()
            ->where('asset.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('asset_id', 'asc');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Asset id", "asset_id")
                ->searchable()
                ->sortable(),
            Column::make("Number KK", "household.number_kk")
                ->searchable()
                ->sortable(),
            Column::make("Asset Name", "name")
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->label(fn($row, Column $column) => view('column-action', ['id' => $row->asset_id]))
                ->html(),
        ];
    }

    public function show($assetId)
    {
        return redirect()->route('asset.show', $assetId);
    }

    public function edit($assetId)
    {
        return redirect()->route('asset.edit', $assetId);
    }

    public function archive($id)
    {
        $asset = AssetModel::find($id);
        $asset->is_archived = true;
        $asset->save();
    }
}
