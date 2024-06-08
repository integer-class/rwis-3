@props([
    'id' => null,
    'menu' => [
        'show',
        'edit',
        'archive',
    ]
])

<div class="flex items-center gap-2">
    @if(in_array('show', $menu))
        <button class="show-btn text-white font-bold p-2 rounded" wire:click="show({{ $id }})">Lihat</button>
    @endif
    @if (in_array('edit', $menu))
        <button class="edit-btn text-white font-bold p-2 rounded" wire:click="edit({{ $id }})">Ubah</button>
    @endif
    @if(in_array('archive', $menu))
        <button
            class="archive-btn text-white font-bold p-2 rounded"
            onclick="document.getElementById('my_modal_{{ $id }}').showModal()"
        >
            Arsipkan
        </button>
        <dialog id="my_modal_{{ $id }}" class="modal">
            <div class="modal-box rounded-md shadow-xl">
                <h3 class="font-bold text-lg mt-2 ml-2">Perhatian!</h3>
                <p class="py-4 mt-2 ml-2">Apakah anda yakin untuk mengarsipkan data ini?</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button
                            class="archive-btn text-white font-bold p-2 m-1 rounded"
                            wire:click="archive({{ $id }})"
                        >
                            Arsipkan
                        </button>
                        <button class="add-btn text-white font-bold p-2 mx-2 mb-2 m-1 rounded">Tutup</button>
                    </form>
                </div>
            </div>
        </dialog>
    @endif
</div>

@if(in_array('unarchive', $menu))
    <button
        class="show-btn text-white font-bold p-2 rounded"
        onclick="document.getElementById('my_modal_{{ $id }}').showModal()"
    >
        Pulihkan
    </button>
    <dialog id="my_modal_{{ $id }}" class="modal">
        <div class="modal-box rounded-md shadow-xl">
            <h3 class="font-bold text-lg mt-2 ml-2">Perhatian!</h3>
            <p class="py-4 mt-2 ml-2">Apakah anda yakin untuk memulihkan data ini?</p>
            <div class="modal-action">
                <form method="dialog">
                    <button
                        class="show-btn text-white font-bold p-2 m-1 rounded"
                        wire:click="unarchive({{ $id }})"
                    >
                        Pulihkan
                    </button>
                    <button class="add-btn text-white font-bold p-2 mx-2 mb-2 m-1 rounded">
                        Tutup
                    </button>
                </form>
            </div>
        </div>
    </dialog>
@endif
