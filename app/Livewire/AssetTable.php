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
                ->label(
                    function ($row, Column $column) {
                        $show = '<button class="show-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="show(' . $row->asset_id . ')">Show</button>';
                        $edit = '<button class="edit-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="edit(' . $row->asset_id . ')">Edit</button>';
                        $archive = '<button class="archive-btn text-white font-bold p-2 mx-2 m-1 rounded" onclick="document.getElementById(\'my_modal_' . $row->asset_id . '\').showModal()">Archive</button>
                        <dialog id="my_modal_' . $row->asset_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to archive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="archive-btn text-white font-bold p-2 m-1 rounded" wire:click="archive(' . $row->asset_id . ')">Archive</button>
                                <button class="add-btn text-white font-bold p-2 mx-2 mb-2 m-1 rounded">Close</button>
                              </form>
                            </div>
                          </div>
                        </dialog>';
                        return $show . $edit . $archive;
                    }
                )->html(),
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
