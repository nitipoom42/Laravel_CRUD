<style>
    .imageProduct {
        width: 100px;
        height: 100px;
    }

</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-success" href="{{ route('product.create') }}">เพิ่มสินค้า</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รูป</th>
                            <th>ชื่้อ</th>
                            <th>ราคา</th>
                            <th>จำนวนคงเหลือ</th>
                            <th>รานละเอียด</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $key => $items)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td><img class="imageProduct" src="{{ asset('storage/' . $items->image) }}" alt=""></td>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->price }}</td>
                                <td>{{ $items->amount }}</td>
                                <td>{{ $items->desc }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-warning"
                                                href="{{ route('product.edit', $items->id) }}">แก้ไข</a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route('product.destroy', $items->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">ลบ</button>
                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
