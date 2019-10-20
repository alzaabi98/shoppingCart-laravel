@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <p class="mb-4">
                Total Amount is <strong> ${{ $amount}}</strong>
            </p>
        </div>
    </div>
</div>
@endsection