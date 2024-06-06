@extends('admin.layouts.master')
@section('title')
    Xem chi tiet san pham : {{$model->name}}
@endsection
@section('content')
    <table>
        <tr>
            <th>TRUONG</th>
            <th>GIA TRI</th>

        </tr>
        @foreach($model->toArray() as $key => $value)
            <tr>
                <td>{{$key}}</td>
                <td>
                    @php
                    if($key =='cover'){
                        $url=\Storage::url($value);
                         echo "<img src=\"$url\" alt=\"\"width=\"50px\" >";
                    }elseif (\Str::contains($key,'is_')){
                        echo $value ?
                                'Yes':'No';
                    }else{
                        echo $value;
                    }

                     @endphp
                </td>
            </tr>
        @endforeach
    </table>
@endsection

