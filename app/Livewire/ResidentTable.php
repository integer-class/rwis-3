<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ResidentModel;
use Illuminate\Database\Eloquent\Builder;

class ResidentTable extends DataTableComponent
{
    protected $model = ResidentModel::class;

    public function builder(): Builder
    {
        return ResidentModel::query()
            ->where('resident.is_archived', false);
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
            Column::make("Address", "household.address")
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $show = '<button class="show-btn text-white font-bold p-2 rounded" wire:click="show(' . $row->resident_id . ')">Show</button>';
                        $edit = '<button class="edit-btn text-white font-bold p-2 rounded" wire:click="edit(' . $row->resident_id . ')">Edit</button>';
                        $archive = '<button class="archive-btn text-white font-bold p-2 rounded" onclick="document.getElementById(\'my_modal_' . $row->resident_id . '\').showModal()">Archive</button>
                        <dialog id="my_modal_' . $row->resident_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to archive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="archive-btn text-white font-bold p-2 m-1 rounded" wire:click="archive(' . $row->resident_id . ')">Archive</button>
                                <button class="add-btn text-white font-bold p-2 mx-2 mb-2 m-1 rounded">Close</button>
                              </form>
                            </div>
                          </div>
                        </dialog>';
                        return '<div class="flex items-center gap-2">' . $show . $edit . $archive . '</div>';
                    }
                )->html(),
        ];
    }

    public function show($residentId)
    {
        return redirect()->route('resident.show', $residentId);
    }

    public function edit($residentId)
    {
        return redirect()->route('resident.edit', $residentId);
    }

    public function archive($id)
    {
        $resident = ResidentModel::find($id);
        $resident->is_archived = true;
        $resident->save();
    }
}
