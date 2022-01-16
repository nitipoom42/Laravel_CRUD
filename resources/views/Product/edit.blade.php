<style>
    #output {
        width: 300px;
        height: 300px;
        object-fit: cover;
    }

</style>


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img id="output" src="{{ asset('storage/' . $product->image) }}" />
                            <div class="input-group mb-3">
                                <input type="file" accept="image/*" class="form-control mt-2" name="image"
                                    onchange="loadFile(event)">
                            </div>
                        </div>
                    </div>



                    <label for="">ชื่อสินค้า</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="">ราคา</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                            </div>
                        </div>
                        <div class="   col-md-3">
                            <label for="">จำนวน</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="amount" value="{{ $product->amount }}">
                            </div>
                        </div>
                    </div>


                    <div class="   input-group mt-3">
                        <span class="input-group-text">รายละเอียด</span>
                        <textarea class="form-control" name="desc"
                            aria-label="With textarea">{{ $product->desc }}</textarea>
                    </div>

                    <button type="submot" class="btn btn-success mt-2">ตกลง</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
