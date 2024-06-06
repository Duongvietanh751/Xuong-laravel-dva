@extends('admin.layouts.master')
@section('title')
    UPDATE DANH MUC: {{$model->name}}
@endsection
@section('content')
    <form action="{{route('admin.catalogues.update' , $model->id)}}"
          method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="{{$model->name}}" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">FILE</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                    <img src="{{\Storage::url($model->cover)}}" width="50px">

                </div>
            </div>
            <div class="col-md-6">

                <div class="form-check mb-3">
                    <label class="form-label">
                        <input class="form-check-input" type="checkbox" value="1"
                               @if($model->is_active)checked @endif
                                name="is_active">IS Active
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection


