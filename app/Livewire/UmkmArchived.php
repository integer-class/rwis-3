<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UmkmModel;
use Illuminate\Database\Eloquent\Builder;

class UmkmArchived extends DataTableComponent
{
    protected $model = UmkmModel::class;

    public function builder(): Builder
    {
        return UmkmModel::query()
            ->where('umkm.is_archived', true);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('umkm_id', 'asc');
        $this->setSearchFieldAttributes([
            'class' => 'rounded-lg border border-gray-300 p-2',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Umkm id", "umkm_id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Whatsapp number", "whatsapp_number")
                ->sortable(),
            Column::make('Actions')
                ->label(fn($row) => view('components.column-action', ['id' => $row->umkm_id, 'menu' => ['unarchive']]))
                ->html(),
        ];
    }

    public function unarchive($id)
    {
        $umkm = UmkmModel::find($id);
        $umkm->is_archived = false;
        $umkm->save();
    }
}
