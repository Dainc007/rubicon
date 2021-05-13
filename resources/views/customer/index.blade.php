@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h2 class="mb-4">
        Laravel 7 Import and Export CSV & Excel to Database Example
    </h2>

    <form action="{{ route('csv.import') }}" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
            <div class="custom-file text-left">
                <input type="file" name="csv" class="custom-file-input" id="csv">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <button class="btn btn-primary">Import data</button>
        @method('POST')
        @csrf
    </form>

    <form action="{{ route('json.import') }}" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
            <div class="custom-file text-left">
                <input type="file" name="json" class="custom-file-input" id="json">
                <label class="custom-file-label" for="customFile">Choose json file</label>
            </div>
        </div>
        <button class="btn btn-primary">Import data</button>
        @method('POST')
        @csrf
    </form>

    <form action="{{ route('ldif.import') }}" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
            <div class="custom-file text-left">
                <input type="file" name="ldif" class="custom-file-input" id="ldif">
                <label class="custom-file-label" for="customFile">Choose ldif file</label>
            </div>
        </div>
        <button class="btn btn-primary">Import data</button>
        @method('POST')
        @csrf
    </form>
</div>
@endsection