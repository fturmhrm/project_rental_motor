@extends('layout.layouts')

@section('content')
    <h1 class="text-center">halaman edit</h1>
    <form action="{{ route('rental.edit.formulir', $rental->id) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <h2 class="mb-4">Edit Data Rental</h2>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama"
                    value="{{ old('name', $rental->name) }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Jenis Motor :</label>
            <div class="col-sm-10">
                <select class="form-select" name="type" id="type">
                    <option selected disabled hidden>Pilih</option>
                    <option value="beat"{{ old('type', $rental->type) == 'beat' ? 'selected' : '' }}>Beat</option>
                    <option value="aerox"{{ old('type', $rental->type) == 'aerox' ? 'selected' : '' }}>Aerox</option>
                    <option value="vario"{{ old('type', $rental->type) == 'vario' ? 'selected' : '' }}>Vario</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="hours" class="col-sm-2 col-form-label">Lama Rental:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="hours" name="hours" placeholder="Lama Rental (Jam)"
                    value="{{ old('hours', $rental->hours) }}">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3">Edit Data</button>
        </div>
    </form>

@endsection
