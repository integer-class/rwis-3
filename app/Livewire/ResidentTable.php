<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ResidentModel;

class ResidentTable extends DataTableComponent
{
    protected $model = ResidentModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
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
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $show = '<button class="show-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="show(' . $row->resident_id . ')">Show</button>';
                        $edit = '<button class="edit-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="edit(' . $row->resident_id . ')">Edit</button>';
                        $delete = '<button class="archive-btn text-white font-bold p-2 mx-2 m-1 rounded" wire:click="delete(' . $row->id . ')">Archive</button>';
                        return $show . $edit . $delete;
                    }
                )->html(),
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
}
