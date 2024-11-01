@extends('layout/master')

@section('title')
    Thêm mới loại sản phẩm
@endsection

@section('content')
    <h1>Thêm mới loại sản phẩm</h1>
    <form action="{{route('dsLoaiSP.save')}}" id="form-create" name="form-create" method="POST">
        @csrf
        <div class="mb-3">
            <label for="lsp_ten" class="form-label">Tên loại sản phẩm:</label>
            <input type="text" name="lsp_ten" id="lsp_ten" class="form-control">
        </div>
        <div class="mb-3">
            <label for="lsp_mota" class="form-label">Mô tả loại sản phẩm:</label>
            <textarea name="lsp_mota" id="lsp_mota" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3 d-grid gap-2">
            <button class="btn btn-primary">Thêm mới</button>
            <a href="{{route('dsLoaiSP.index')}}" class="btn btn-danger">Huỷ</a>
        </div>
    </form>
@endsection