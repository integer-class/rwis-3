<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AssetModel;
use Illuminate\Database\Eloquent\Builder;

class AssetArchivedTable extends DataTableComponent
{
    protected $model = AssetModel::class;

    public function builder(): Builder

    {

        return AssetModel::query()

            ->where('asset.is_archived', true);
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
                ->label(
                    function ($row, Column $column) {
                        $unarchive = '<button class="show-btn text-white font-bold p-2 mx-2 m-1 rounded" onclick="document.getElementById(\'my_modal_' . $row->asset_id . '\').showModal()">Unarchive</button>
                        <dialog id="my_modal_' . $row->asset_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to unarchive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <button class="show-btn text-white font-bold p-2 m-1 rounded" wire:click="unarchive(' . $row->asset_id . ')">Unarchive</button>
                                <button class="add-btn text-white font-bold p-2 mx-2 mb-2 m-1 rounded">Close</button>
                              </form>
                            </div>
                          </div>
                        </dialog>';
                        return $unarchive;
                    }
                )->html(),
        ];
    }

    public function unarchive($id)
    {
        $asset = AssetModel::find($id);
        $asset->is_archived = false;
        $asset->save();
    }
}
