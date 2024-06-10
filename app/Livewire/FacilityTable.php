<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Builder;

class FacilityTable extends DataTableComponent
{
    protected $model = Facility::class;

    public function builder(): Builder
    {
        return Facility::query()
            ->where('facility.is_archived', false);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('facility_id', 'asc');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "facility_id")
                ->hideIf(true),
            Column::make("Nama", "name")
                ->sortable(),
            Column::make("Alamat", "address")
                ->sortable(),
            Column::make('Aksi')
                ->label(fn($row, Column $column) => view('components.column-action', ['id' => $row->facility_id]))
                ->html(),
        ];
    }

    public function show($facilityId)
    {
        return redirect()->route('information.facility.show', $facilityId);
    }

    public function edit($facilityId)
    {
        return redirect()->route('information.facility.edit', $facilityId);
    }

    public function archive($id)
    {
        $facility = Facility::find($id);
        $facility->is_archived = true;
        $facility->save();
    }
}
