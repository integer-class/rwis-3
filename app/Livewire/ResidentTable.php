<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ResidentModel;
use Illuminate\Database\Eloquent\Builder;

class ResidentTable extends DataTableComponent
{
    protected $model = ResidentModel::class;

    public function builder(): Builder
    {
        return ResidentModel::query()
            ->where('resident.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('resident_id', 'asc');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Resident id", "resident_id")
                ->searchable()
                ->sortable(),
            Column::make("Full name", "full_name")
                ->searchable()
                ->sortable(),
            Column::make("Nik", "nik")
                ->searchable()
                ->sortable(),
            Column::make("Address", "household.address")
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->label(fn($row, Column $column) => view('column-action', ['id' => $row->resident_id]))
                ->html(),
        ];
    }

    public function show($residentId)
    {
        return redirect()->route('resident.show', $residentId);
    }

    public function edit($residentId)
    {
        return redirect()->route('resident.edit', $residentId);
    }

    public function archive($id)
    {
        $resident = ResidentModel::find($id);
        $resident->is_archived = true;
        $resident->save();
    }
}
