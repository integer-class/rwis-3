@extends('admin-layout.base')

@push('head_scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
@endpush

@section('content')
    @vite('resources/css/resident/app.css')
    <form
        class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5" action="{{ route('send.broadcast') }}" method="POST"
        x-data="{ id: '', input: '', receivers: [], mode: 'all' }"
    >
        @csrf
        <input type="hidden" name="numbers" x-bind:value="receivers"/>
        <input type="hidden" name="message" x-bind:value="$refs.message.innerText"/>
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-3xl font-bold text-slate-800">Send Broadcast</h3>
            <p class="text-slate-700">
                Ubah pesan yang ditandai dengan tanda kurung [ ] sesuai dengan data yang ingin dikirimkan.
                <br />
                Contoh: "Halo, [nama]" diganti menjadi "Halo, Warga"
            </p>
            <div class="mt-4 p-4 border border-gray-300 rounded-md" x-ref="message">
                {!! $markup !!}
            </div>
            <div class="flex items-start gap-4 mt-4 w-full">
                <label class="form-control">
                    <span class="label-text mb-2">Jenis Penerima</span>
                    <select class="select select-bordered" x-model="mode">
                        <option disabled selected>Pilih Jenis Penerima</option>
                        <option value="all">Semua Warga</option>
                        <option value="resident">Warga</option>
                    </select>
                </label>
                <div class="flex-1">
                    <label class="form-control">
                        <span class="label-text mb-2">Penerima</span>
                        <div class="flex gap-2 items-center">
                            <input
                                x-bind:disabled="mode === 'all'"
                                class="flex-1 input input-bordered" minlength="3" list="candidates"
                                x-model="input"
                                @input="id = input.length > 3 ? 'candidates' : ''"
                            />
                            <button
                                x-bind:disabled="mode === 'all'"
                                type="button"
                                class="btn btn-primary"
                                @click="receivers.push(input); input = ''; id = '';"
                            >
                                Tambah
                            </button>
                        </div>
                        <datalist class="h-20 overflow-hidden" x-bind:id="id">
                            @foreach($residentPhoneNumbers as $residentPhoneNumber)
                                <option value="{{ $residentPhoneNumber->whatsapp_number }}">
                                    {{ $residentPhoneNumber->full_name }} ({{ $residentPhoneNumber->whatsapp_number }})
                                </option>
                            @endforeach
                        </datalist>
                    </label>
                    <div class="flex items-center flex-wrap">
                        <template x-for="receiver in receivers" :key="receiver">
                            <div
                                class="flex items-center bg-gray-100 border border-gray-200 rounded-md px-2 py-1 mr-2 mt-2"
                            >
                                <span x-text="receiver"></span>
                                <button
                                    type="button"
                                    class="ml-2 flex items-center text-red-500 border-l border-gray-200 pl-1"
                                    @click="receivers = receivers.filter(item => item !== receiver)"
                                >
                                    <span class="icon-[ic--round-close]"></span>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-end mt-4">
                <button class="btn btn-primary ml-auto text-white">
                    Kirim Sekarang
                </button>
            </div>
        </div>
    </form>
@endsection
