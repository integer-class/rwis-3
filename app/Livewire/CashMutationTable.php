<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\CashMutationModel;
use Illuminate\Database\Eloquent\Builder;

class CashMutationTable extends DataTableComponent
{
    protected $model = CashMutationModel::class;

    public function builder(): Builder
    {
        return CashMutationModel::query()
            ->where('cash_mutation.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('cash_mutation_id', 'asc');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Cash Mutation ID", "cash_mutation_id")
                ->searchable()
                ->sortable()
                ->hideIf(true),
            Column::make("Cash Mutation Code", "cash_mutation_code")
                ->searchable()
                ->sortable(),
            Column::make("Account Sender", "accountSender.name_account")
                ->searchable()
                ->sortable(),
            Column::make("Amount", "amount")
                ->format(function ($value) {
                    return "Rp. " . number_format($value, 0, ',', '.');
                })
                ->searchable()
                ->sortable(),
            Column::make("Account Receiver", "accountReceiver.name_account")
                ->searchable()
                ->sortable(),
            Column::make("Description", "description")
                ->searchable()
                ->sortable(),
            Column::make("Date", "created_at")
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->label(fn($row) => view('components.column-action', ['id' => $row->cash_mutation_id, 'menu' => ['show', 'archive']]))
                ->html(),
        ];
    }

    public function show($assetId)
    {
        return redirect()->route('bookkeeping.cashmutation.show', $assetId);
    }

    public function archive($id)
    {
        $asset = CashMutationModel::find($id);
        $asset->is_archived = true;
        $asset->save();
    }
}
