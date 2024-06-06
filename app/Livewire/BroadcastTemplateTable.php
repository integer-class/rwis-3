<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BroadcastTemplateModel;
use Illuminate\Database\Eloquent\Builder;

class BroadcastTemplateTable extends DataTableComponent
{
    protected $model = BroadcastTemplateModel::class;

    public function builder(): Builder
    {
        return BroadcastTemplateModel::query()->where('broadcast_template.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('broadcast_template_id');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Broadcast template id", "broadcast_template_id")
                ->hideIf(true),
            Column::make("Text", "text")
                ->sortable()
                ->searchable(),
            Column::make("Type", "type")
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(
                    function ($row) {
                        $send = '<a class="approve-btn text-white font-bold p-2 m-1 rounded" href="/broadcast/send/' . $row->broadcast_template_id . '">Send</a>';
                        $show = '<button class="show-btn text-white font-bold p-2 m-1 rounded" wire:click="show(' . $row->broadcast_template_id . ')">Show</button>';
                        $edit = '<button class="edit-btn text-white font-bold p-2 m-1 rounded" wire:click="edit(' . $row->broadcast_template_id . ')">Edit</button>';
                        $archive = '<button class="archive-btn text-white font-bold p-2 m-1 rounded" onclick="document.getElementById(\'my_modal_' . $row->broadcast_template_id . '\').showModal()">Archive</button>
                        <dialog id="my_modal_' . $row->broadcast_template_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to archive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="archive-btn text-white font-bold p-2 m-1 rounded" wire:click="archive(' . $row->broadcast_template_id . ')">Archive</button>
                                <button class="add-btn text-white font-bold p-2 mx-2 mb-2 m-1 rounded">Close</button>
                              </form>
                            </div>
                          </div>
                        </dialog>';
                        return '<div class="flex items-center gap-2">' . $send . $show . $edit . $archive . '</div>';
                    }
                )->html(),
        ];
    }

    public function show($broadcast_template_id)
    {
        return redirect()->route('template.show', $broadcast_template_id);
    }

    public function edit($broadcast_template_id)
    {
        return redirect()->route('template.edit', $broadcast_template_id);
    }

    public function archive($id)
    {
        $broadcastTemplate = BroadcastTemplateModel::find($id);
        $broadcastTemplate->is_archived = true;
        $broadcastTemplate->save();
    }
}
