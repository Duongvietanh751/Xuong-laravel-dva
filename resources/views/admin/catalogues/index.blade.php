@extends('admin.layouts.master')
@section('title')
    Danh sách danh mục sản phẩm
@endsection
@section('content')
    <a href="{{route('admin.catalogues.create')}}" class="btn btn-primary mb-3">Thêm Mới</a>
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>COVER</th>
            <th> IS ACTIVE</th>
            <th>CREATED AT</th>
            <th>UPDATE AT</th>
            <th>ACTION</th>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>
                <img src="{{\Storage::url($item->cover)}}" width="50px">
            </td>
            <td>{{$item->is_active ? 'Yes':'No'}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->update_at}}</td>
            <td>
                <a href="{{route('admin.catalogues.show',$item->id)}}" class="btn btn-info mb-3">SHOW</a>
                <a href="{{route('admin.catalogues.edit',$item->id)}}" class="btn btn-warning mb-3">EDIT</a>
                <a href="{{route('admin.catalogues.destroy',$item->id)}}" class="btn btn-danger mb-3" onclick="return confirm('Ban co muon xoa khong?')">DELETE</a>

            </td>
        </tr>
        @endforeach
    </table>
  
@endsection
