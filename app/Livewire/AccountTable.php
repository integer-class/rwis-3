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
                ->label(fn($row, Column $column) => view('column-action', ['id' => $row->account_id]))
                ->html(),
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
