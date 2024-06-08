<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\CashMutationModel;
use Illuminate\Database\Eloquent\Builder;

class CashMutationArchivedTable extends DataTableComponent
{
    protected $model = CashMutationModel::class;

    public function builder(): Builder
    {
        return CashMutationModel::query()
            ->where('cash_mutation.is_archived', true);
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
                ->sortable(),
            Column::make("Cash Mutation Code", "cash_mutation_code")
                ->searchable()
                ->sortable(),
            Column::make("Account Sender", "accountSender.name_account")
                ->searchable()
                ->sortable(),
            Column::make("Amount", "amount")
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
                ->label(fn($row) => view('components.column-action', ['id' => $row->cash_mutation_id, 'menu' => ['unarchive']]))
                ->html(),
        ];
    }

    public function unarchive($id)
    {
        $asset = CashMutationModel::find($id);
        $asset->is_archived = false;
        $asset->save();
    }
}
