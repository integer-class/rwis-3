<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Builder;

class FacilityTable extends DataTableComponent
{
    protected $model = AssetModel::class;

    public function builder(): Builder

    {

        return Facility::query()

            ->where('facility.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('facility_id', 'asc');
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
                ->sortable(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $show = '<button class="show-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="show(' . $row->facility_id . ')">Show</button>';
                        $edit = '<button class="edit-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="edit(' . $row->facility_id . ')">Edit</button>';
                        $archive = '<button class="archive-btn text-white font-bold p-2 mx-2 m-1 rounded" onclick="document.getElementById(\'my_modal_' . $row->facility_id . '\').showModal()">Archive</button>
                        <dialog id="my_modal_' . $row->facility_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to archive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="archive-btn text-white font-bold p-2 m-1 rounded" wire:click="archive(' . $row->facility_id . ')">Archive</button>
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

    public function show($facilityId)
    {
        return redirect()->route('facility.show', $facilityId);
    }

    public function edit($facilityId)
    {
        return redirect()->route('facility.edit', $facilityId);
    }

    public function archive($id)
    {
        $facility = Facility::find($id);
        $facility->is_archived = true;
        $facility->save();
    }
}
