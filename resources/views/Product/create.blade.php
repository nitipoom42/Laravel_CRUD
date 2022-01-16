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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img id="output"
                                src="https://www.vkplastic.com/wp-content/uploads/2021/12/%E0%B8%9A%E0%B8%A3%E0%B8%A3%E0%B8%88%E0%B8%B8%E0%B8%A0%E0%B8%B1%E0%B8%93%E0%B8%91%E0%B9%8C%E0%B8%A3%E0%B8%B5%E0%B9%84%E0%B8%8B%E0%B9%80%E0%B8%84%E0%B8%B4%E0%B8%A5.jpg" />
                            <div class="input-group mb-3">
                                <input type="file" accept="image/*" class="form-control mt-2" name="image"
                                    onchange="loadFile(event)">
                            </div>
                        </div>
                    </div>



                    <label for="">ชื่อสินค้า</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" id="">
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="">ราคา</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="price" id="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">จำนวน</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="amount" id="">
                            </div>
                        </div>
                    </div>


                    <div class="input-group mt-3">
                        <span class="input-group-text">รายละเอียด</span>
                        <textarea class="form-control" name="desc" aria-label="With textarea"></textarea>
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
