<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them moi danh muc</title>
</head>
<body>
    <h1>THEM MOI</h1>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <button type="submit">SAVE</button>
    </form>
</body>
</html>