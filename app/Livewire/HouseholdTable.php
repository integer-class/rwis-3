<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\HouseholdModel;
use Illuminate\Database\Eloquent\Builder;

class HouseholdTable extends DataTableComponent
{
    protected $model = HouseholdModel::class;

    public function builder(): Builder

    {

        return HouseholdModel::query()

            ->where('household.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('household_id', 'asc');
        $this->setSearchFieldAttributes([

            'class' => 'rounded-lg border border-gray-300 p-2',

        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Household id", "household_id")
                ->sortable(),
            Column::make("Number kk", "number_kk")
                ->sortable()
                ->searchable(),
            Column::make("Full address", "full_address")
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $show = '<button class="show-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="show(' . $row->household_id . ')">Show</button>';
                        $edit = '<button class="edit-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="edit(' . $row->household_id . ')">Edit</button>';
                        $archive = '<button class="archive-btn text-white font-bold p-2 mx-2 m-1 rounded" onclick="document.getElementById(\'my_modal_' . $row->household_id . '\').showModal()">Archive</button>
                        <dialog id="my_modal_' . $row->household_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to archive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="archive-btn text-white font-bold p-2 m-1 rounded" wire:click="archive(' . $row->household_id . ')">Archive</button>
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

    public function show($householdId)
    {
        return redirect()->route('household.show', $householdId);
    }

    public function edit($householdId)
    {
        return redirect()->route('household.edit', $householdId);
    }

    public function archive($id)
    {
        $resident = HouseholdModel::find($id);
        $resident->is_archived = true;
        $resident->save();
    }
}
