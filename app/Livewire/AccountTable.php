<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AccountModel;
use Illuminate\Database\Eloquent\Builder;

class AccountTable extends DataTableComponent
{
    protected $model = AccountModel::class;

    public function builder(): Builder
    {
        return AccountModel::query()
            ->where('account.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('account_id', 'asc');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Account id", "account_id")
                ->searchable()
                ->sortable(),
            Column::make("Name Account", "name_account")
                ->searchable()
                ->sortable(),
            Column::make("Number Account", "number_account")
                ->searchable()
                ->sortable(),
            Column::make("Balance", "balance")
                ->format(function ($value) {
                    return "Rp. " . number_format($value, 0, ',', '.');
                })
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $show = '<button class="show-btn text-white font-bold p-2 rounded" wire:click="show(' . $row->account_id . ')">Show</button>';
                        $edit = '<button class="edit-btn text-white font-bold p-2 rounded" wire:click="edit(' . $row->account_id . ')">Edit</button>';
                        $archive = '<button class="archive-btn text-white font-bold p-2 rounded" onclick="document.getElementById(\'my_modal_' . $row->account_id . '\').showModal()">Archive</button>
                        <dialog id="my_modal_' . $row->account_id . '" class="modal">
                          <div class="modal-box rounded-md shadow-xl">
                            <h3 class="font-bold text-lg mt-2 ml-2">Alert!</h3>
                            <p class="py-4 mt-2 ml-2">Are you sure to archive this data?</p>
                            <div class="modal-action">
                              <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="archive-btn text-white font-bold p-2 m-1 rounded" wire:click="archive(' . $row->account_id . ')">Archive</button>
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

    public function show($assetId)
    {
        return redirect()->route('bookkeeping.account.show', $assetId);
    }

    public function edit($assetId)
    {
        return redirect()->route('bookkeeping.account.edit', $assetId);
    }

    public function archive($id)
    {
        $asset = AccountModel::find($id);
        $asset->is_archived = true;
        $asset->save();
    }
}
