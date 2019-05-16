@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajouter des localisations') }}</div>

                <div class="card-body">
                    <form method="POST" class="form-group" action="/create" enctype="multipart/form-data"
                        class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input">
                        @csrf
                        <div class="form-group row p-3">
                            <input type="text" id="location" name="location" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Soumettre
                        </button>
                    </form>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
