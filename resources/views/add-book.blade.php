@extends('theme.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Book</h1>
        </div>
    </div>

    @include('theme.input', ['type' => $type])
@endsection