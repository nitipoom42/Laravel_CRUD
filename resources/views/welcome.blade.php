@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <h1>Hello Word</h1>
                    <h3>
                        <a href="{{ route('product.index') }}">ดูคลังสินค้า</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
