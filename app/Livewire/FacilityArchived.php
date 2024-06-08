<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Builder;

class FacilityArchived extends DataTableComponent
{
    protected $model = Facility::class;

    public function builder(): Builder
    {
        return Facility::query()
            ->where('facility.is_archived', true);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('facility_id');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Facility id", "facility_id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Description", "description")
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        return '<button class="show-btn text-white font-bold p-2 rounded" onclick="document.getElementById(\'my_modal_' . $row->facility_id . '\').showModal()">Unarchive</button>
                        <dialog id="my_modal_' . $row->facility_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to unarchive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <button class="show-btn text-white font-bold p-2 m-1 rounded" wire:click="unarchive(' . $row->facility_id . ')">Unarchive</button>
                                <button class="add-btn text-white font-bold p-2 mx-2 mb-2 m-1 rounded">Close</button>
                              </form>
                            </div>
                          </div>
                        </dialog>';
                    }
                )->html(),
        ];
    }

    public function unarchive($id)
    {
        $facility = Facility::find($id);
        $facility->is_archived = false;
        $facility->save();
    }
}
