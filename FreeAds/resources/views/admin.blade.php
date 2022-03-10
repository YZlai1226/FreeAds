<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css"> 
    <title>admin</title>
</head>

<body>

    <table class="table table-hover">

        <thead>

            <th>id</th>

            <th>picture(s)</th>

            <th>title</th>

            <th>category</th>

            <th>description</th>

            <th>location</th>

            <th>price</th>

            <th>action</th>

        </thead>

        <tbody>
            @foreach($ads as $valueAd)

            <tr>

                <td>{{$valueAd->id}} </td>

                <td>
                    <img src="{{ asset('images/'.$valueAd->picture) }}" alt="ad image" width="300px">
                </td>

                <td>{{$valueAd->title}} </td>

                <td>{{$valueAd->category}} </td>

                <td>{{$valueAd->description}} </td>

                <td>{{$valueAd->location}} </td>

                <td>{{$valueAd->price}} </td>

                <td>
                    <a href="/admin/verify/{{$valueAd->id}}">
                        <button type="submit" name="verify_ads" value="verify ads" class="btn btn-primary">Verify</button>
                    </a>
                    <!-- <form action="/admin" method="post">
                <button type="submit" name="delete_category" value="delete category" class="btn btn-primary">Delete</button>
            </form> -->
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>

    <!-- ===================================== category table ======================================= -->

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

                <td>
                    <!-- <form action="/category_edit" method="post"> -->
                    <a href="/admin/edit/{{$value->id}}">
                        <button type="submit" name="edit_category" value="edit category" class="btn btn-primary">Edit</button>
                    </a>
                    <!-- </form> -->
                    <a href="/admin/delete/{{$value->id}}">
                        <button type="submit" name="delete_category" value="delete category" class="btn btn-primary">Delete</button>
                    </a>
                    <!-- <form action="/admin" method="post">
                        <button type="submit" name="delete_category" value="delete category" class="btn btn-primary">Delete</button>
                    </form> -->
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>



    <a href='/admin/adForm'>Add New</a>
    <a href='/'>HOME</a>
</body>

</html>