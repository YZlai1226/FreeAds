<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>

<body>
    <table class="table table-hover">

        <thead>

            <th>id</th>

            <th>name</th>

            <th>action</th>

        </thead>

        <tbody>
            @foreach($category as $value)

            <tr>

                <td>{{$value->id}} </td>

                <td>{{$value->name}} </td>

                <td> </td>

            </tr>
            @endforeach

        </tbody>

    </table>

    <a href='/'>Edit</a>
    <a href='/'>Delete</a>
    <a href='/category_create'>Add New</a>
    <a href='/'>HOME</a>
</body>

</html>