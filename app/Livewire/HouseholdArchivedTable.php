<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\HouseholdModel;
use Illuminate\Database\Eloquent\Builder;

class HouseholdArchivedTable extends DataTableComponent
{
    protected $model = HouseholdModel::class;

    public function builder(): Builder
    {
        return HouseholdModel::query()
            ->where('household.is_archived', true);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('household_id', 'asc');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Household id", "household_id")
                ->sortable(),
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
                ->label(fn($row) => view('components.column-action', ['id' => $row->household_id, 'menu' => ['unarchive']]))
                ->html(),
        ];
    }

    public function unarchive($id)
    {
        $resident = HouseholdModel::find($id);
        $resident->is_archived = false;
        $resident->save();
    }
}
