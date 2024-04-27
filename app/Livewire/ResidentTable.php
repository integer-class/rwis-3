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
                        $delete = '<button class="bg-blue-500 hover:bg-blue-700 font-bold p-2 rounded m-1" wire:click="delete(' . $row->id . ')">Archive</button>';
                        $edit = '<button class="bg-blue-500 hover:bg-blue-700 font-bold p-2 rounded m-1" wire:click="edit(' . $row->id . ')">Edit</button>';
                        return $edit . $delete;
                    }
                )->html(),
        ];
    }
}
