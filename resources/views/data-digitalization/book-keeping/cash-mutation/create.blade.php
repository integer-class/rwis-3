@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mx-5 mt-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Cash Mutation</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('data') }}">Home</a></li>
                        <li><a href="{{ url('data/bookkeeping/cash') }}">Cash Mutation</a></li>
                        <li>Add Cash Mutation</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <form action="{{ url('data/bookkeeping/cash') }}" method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                @csrf
                @if ($errors->any())
                    <div class="bg-red-100 text-red-500 p-2 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="flex flex-col space-y-1">
                    <label for="cash_mutation_code">Cash Mutation Code</label>
                    <input type="text" name="cash_mutation_code" id="cash_mutation_code" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your name account" value="{{ $cash_mutation_code }}" readonly>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="account_sender_id">Account Sender</label>
                    <select name="account_sender_id" id="account_sender_id" class="rounded-md border border-gray-300 p-2">
                        <option disabled selected value="">- Choose Cash Account -</option>
                            @foreach ($account as $item)
                            <option value="{{ $item->account_id }}">{{ $item->name_account }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="amount">Amount</label>
                    <input type="text" name="amount" id="amount" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your Amount">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="account_receiver_id">Account Receiver</label>
                    <select name="account_receiver_id" id="account_receiver_id" class="rounded-md border border-gray-300 p-2">
                        <option disabled selected value="">- Choose Cash Account -</option>
                            @foreach ($account as $item)
                            <option value="{{ $item->account_id }}">{{ $item->name_account }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your description">
                </div>
                <div class="flex">
                    <button type="submit" class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6">Add</button>
                    <a class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6 mx-3 text-center" href="{{ url('data/bookkeeping/cash') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
