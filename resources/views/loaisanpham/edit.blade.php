@extends('layout/master')

@section('title')
    Sửa loại sản phẩm
@endsection

@section('content')
    <h1>Sửa loại sản phẩm có mã #{{$editRecord->lsp_ma}}</h1>
    <form action="{{route('dsLoaiSP.update')}}" id="form-edit" name="form-edit" method="POST">
        @csrf
        <input type="hidden" name="lsp_ma" value="{{$editRecord->lsp_ma}}">
        <div class="mb-3">
            <label for="lsp_ten" class="form-label">Tên loại sản phẩm:</label>
            <input type="text" name="lsp_ten" id="lsp_ten" class="form-control" value="{{$editRecord->lsp_ten}}">
        </div>
        <div class="mb-3">
            <label for="lsp_mota" class="form-label">Mô tả loại sản phẩm:</label>
            <textarea name="lsp_mota" id="lsp_mota" cols="30" rows="10" class="form-control">{{$editRecord->lsp_mota}}</textarea>
        </div>
        <div class="mb-3 d-grid gap-2">
            <button class="btn btn-primary">Cập nhật</button>
            <a href="{{route('dsLoaiSP.index')}}" class="btn btn-danger">Huỷ</a>
        </div>
    </form>
@endsection