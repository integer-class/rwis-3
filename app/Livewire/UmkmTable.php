<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UmkmModel;
use Illuminate\Database\Eloquent\Builder;

class UmkmTable extends DataTableComponent
{
    protected $model = UmkmModel::class;

    public function builder(): Builder

    {

        return UmkmModel::query()

            ->where('umkm.is_archived', false);
    }
    

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('umkm_id', 'asc');
        $this->setSearchFieldAttributes([

            'class' => 'rounded-lg border border-gray-300 p-2',

        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Umkm id", "umkm_id")
                ->sortable()
                ->hideIf(true),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Whatsapp number", "whatsapp_number")
                ->sortable(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $show = '<button class="show-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="show(' . $row->umkm_id . ')">Show</button>';
                        $edit = '<button class="edit-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="edit(' . $row->umkm_id . ')">Edit</button>';
                        $archive = '<button class="archive-btn text-white font-bold p-2 mx-2 m-1 rounded" onclick="document.getElementById(\'my_modal_' . $row->umkm_id . '\').showModal()">Archive</button>
                        <dialog id="my_modal_' . $row->umkm_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to archive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="archive-btn text-white font-bold p-2 m-1 rounded" wire:click="archive(' . $row->umkm_id . ')">Archive</button>
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
    public function show($umkmId)
    {
        return redirect()->route('umkm.show', $umkmId);
    }

    public function edit($umkmId)
    {
        return redirect()->route('umkm.edit', $umkmId);
    }

    public function archive($id)
    {
        $umkm = UmkmModel::find($id);
        $umkm->is_archived = true;
        $umkm->save();
    }
}
