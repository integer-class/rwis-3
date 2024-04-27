@extends('admin-layout.base')

@section('content')
    <div class="py-12 bg-white shadow-xl rounded-lg">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Resident Data</h3>
            <div class=" breadcrumbs mb-3">
                <ul>
                  <li><a>Home</a></li> 
                  <li><a>Resident Data</a></li> 
                </ul>
              </div>
            <livewire:resident-table />
        </div>
    </div>
@endsection
