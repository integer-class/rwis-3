<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BroadcastTemplateModel;
use Illuminate\Database\Eloquent\Builder;

class BroadcastTemplateArchivedTable extends DataTableComponent
{
    protected $model = BroadcastTemplateModel::class;

    public function builder(): Builder
    {
        return BroadcastTemplateModel::query()
            ->where('broadcast_template.is_archived', true);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('broadcast_template_id', 'asc');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Broadcast template id", "broadcast_template_id")
                ->sortable(),
            Column::make("Text", "text")
                ->sortable()
                ->searchable(),
            Column::make("Type", "type")
                ->sortable()
                ->searchable(),
                Column::make('Actions')
                ->label(
                    function ($row) {
                        return '<button class="show-btn text-white font-bold p-2 rounded" onclick="document.getElementById(\'my_modal_' . $row->broadcast_template_id . '\').showModal()">Unarchive</button>
                        <dialog id="my_modal_' . $row->broadcast_template_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to unarchive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="show-btn text-white font-bold p-2 m-1 rounded" wire:click="unarchive(' . $row->broadcast_template_id . ')">Unarchive</button>
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
        $broadcastTemplate = BroadcastTemplateModel::find($id);
        $broadcastTemplate->is_archived = false;
        $broadcastTemplate->save();
    }
}
