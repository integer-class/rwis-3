<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UmkmModel;
use Illuminate\Database\Eloquent\Builder;

class UmkmTable extends DataTableComponent
{
    protected $model = UmkmModel::class;

    public function builder(): Builder
    {
        return UmkmModel::query()
            ->where('umkm.is_archived', false);
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
            Column::make("ID", "umkm_id")
                ->hideIf(true),
            Column::make("Nama", "name")
                ->sortable(),
            Column::make("Alamat", "address")
                ->sortable(),
            Column::make("Deskripsi", "description")
                ->sortable(),
            Column::make("Nomor Telepon", "whatsapp_number")
                ->sortable(),
            Column::make('Aksi')
                ->label(fn($row, Column $column) => view('components.column-action', ['id' => $row->umkm_id]))
                ->html(),
        ];
    }

    public function show($umkmId)
    {
        return redirect()->route('umkm.show', $umkmId);
    }

    public function edit($umkmId)
    {
        return redirect()->route('umkm.edit', $umkmId);
    }

    public function archive($id)
    {
        $umkm = UmkmModel::find($id);
        $umkm->is_archived = true;
        $umkm->save();
    }
}
