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
        return HouseholdModel::query()->where('household.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('familyHead.full_name');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Household id", "household_id")
                ->hideIf(true),
            Column::make("Number kk", "number_kk")
                ->sortable()
                ->searchable(),
            Column::make("Family Head", "familyHead.full_name")
                ->sortable()
                ->searchable(),
            Column::make("Address", "address")
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(fn($row, Column $column) => view('components.column-action', ['id' => $row->household_id]))
                ->html(),
        ];
    }

    public function show($householdId)
    {
        return redirect()->route('data.household.show', $householdId);
    }

    public function edit($householdId)
    {
        return redirect()->route('data.household.edit', $householdId);
    }

    public function archive($id)
    {
        $resident = HouseholdModel::find($id);
        $resident->is_archived = true;
        $resident->save();
    }
}
