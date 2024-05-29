<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list danh muc</title>
</head>
<body>
    <h1>List Danh Muc</h1>
    <a href="{{ route('categories.create')}}">THEM MOI</a>
    @if(session('msg'))
        <h2>{{session('msg')}}</h2>
    @endif
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>CREATED AT</th>
            <th>UPDATED AT</th>
            <th>ACTION</th>
        </tr>
        @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->update_at}}</td>
                <td>
                <a href="{{ route('categories.show',$item)}}">Show</a>
                <a href="{{ route('categories.edit',$item)}}">Edit</a>
                <form action="{{ route('categories.destroy',$item)}}" method="post">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Chac la muon xoa khong m?')">DELETE</button>
                </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links() }}
</body>
</html>