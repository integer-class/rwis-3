<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ResidentModel;
use Illuminate\Database\Eloquent\Builder;

class ResidentArchivedTable extends DataTableComponent
{
    protected $model = ResidentModel::class;

    public function builder(): Builder

    {

        return ResidentModel::query()

            ->where('resident.is_archived', true);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('resident_id', 'asc');
        $this->setSearchFieldAttributes([

            'class' => 'rounded-lg border border-gray-300 p-2',

        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Resident id", "resident_id")
                ->searchable()
                ->sortable(),
            Column::make("Full name", "full_name")
                ->searchable()
                ->sortable(),
            Column::make("Nik", "nik")
                ->searchable()
                ->sortable(),
            Column::make("Full Address", "household.full_address")
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $archive = '<button class="show-btn text-white font-bold p-2 mx-2 m-1 rounded" onclick="document.getElementById(\'my_modal_' . $row->resident_id . '\').showModal()">Unarchive</button>
                        <dialog id="my_modal_' . $row->resident_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to unarchive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="show-btn text-white font-bold p-2 m-1 rounded" wire:click="unarchive(' . $row->resident_id . ')">Unarchive</button>
                                <button class="add-btn text-white font-bold p-2 mx-2 mb-2 m-1 rounded">Close</button>
                              </form>
                            </div>
                          </div>
                        </dialog>';
                        return $archive;
                    }
                )->html(),
        ];
    }

    public function unarchive($id)
    {
        $resident = ResidentModel::find($id);
        $resident->is_archived = false;
        $resident->save();
    }
}
