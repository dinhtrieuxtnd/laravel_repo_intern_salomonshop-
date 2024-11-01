@extends('layout/master')

@section('title')
    Thêm mới hình sản phẩm
@endsection

@section('content')
    <h1>Thêm mới hình sản phẩm</h1>
    <form action="{{route('hsp.save')}}" name="form-create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb_3">
            <label for="sp_ma" class="form-label">Chọn sản phẩm</label>
            <select name="sp_ma" id="sp_ma" class="form-control">
                <option value="" disabled selected>--Chọn sản phẩm</option>
                @foreach ($dsSP as $sp)
                    <option value="{{$sp->sp_ma}}">{{$sp->sp_ten}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="hsp_taptin" class="form-label">Chọn hình ảnh</label>
            <input type="file" name="hsp_taptin" id="hsp_taptin" class="form-control">
        </div>
        <div class="mb-3 d-grid gap-2">
            <button class="btn btn-primary">Lưu</button>
            <a href="" class="btn btn-danger">Huỷ</a>
        </div>
    </form>
@endsection
