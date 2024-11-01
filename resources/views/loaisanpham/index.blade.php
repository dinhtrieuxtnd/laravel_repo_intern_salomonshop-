@extends('layout/master')

@section('title')
    Danh sách loại sản phẩm
@endsection

@section('content')
    <h1>Danh sách loại sản phẩm</h1>
    <div class="mb-3">
        <a href="{{route('dsLoaiSP.create')}}" class="btn btn-primary">Thêm mới loại sản phẩm</a>
    </div>
    <table class="table table-bordered">
        <tr class="table-secondary">
            <th>Mã loại sản phẩm</th>
            <th>Tên loại sản phẩm</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        @foreach ($dsLoaiSP as $lsp)
            <tr>
                <td>{{$lsp->lsp_ma}}</td>
                <td>{{$lsp->lsp_ten}}</td>
                <td>{{$lsp->lsp_mota}}</td>
                <td>
                    <a href="{{route('dsLoaiSP.edit', ['lsp_ma' => $lsp->lsp_ma])}}" class="btn btn-warning">Sửa</a>
                    <form action="{{route('dsLoaiSP.delete')}}" style="display: inline" method="POST" name="form-delete">
                        @csrf
                        <input type="hidden" value="{{$lsp->lsp_ma}}" name="lsp_ma">
                        <button class="btn btn-danger">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection