<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="CSS/index.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<div class="level">
    <div class="level-item">
        <div class="navbar is-white">
            <div class="navbar-brand">
                <img src="/images/Logo.png" alt="Logo" style="max-height: 70px" class="mt-5 mx-3">
            </div>
        </div>
    </div>
</div>

<body>
    <div class="level">
        <div class="level-item">
            <p class="is-size-3 has-text-danger px-2 pt-2 ">Administration</p>
        </div>
    </div>


    <body>
        <div class="level">
            <div class="level-item">
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
                                <img src="/storage/{{$valueAd->picture }}" alt="ad image" width="300px">
                            </td>

                            <td>{{$valueAd->title}} </td>

                            <td>{{$valueAd->category}} </td>

                            <td>{{$valueAd->description}} </td>

                            <td>{{$valueAd->location}} </td>

                            <td>{{$valueAd->price}}€ </td>

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
            </div>
        </div>
        <!-- ===================================== category table ======================================= -->
        <div class="level">
            <div class="level-item">
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
            </div>
        </div>

        <div class="level">
            <div class="level-item">
                <a href='/admin/adForm'>
                    <button class="button mr-3" type="submit" name="edit_password" value="edit_password">Add New Category</button>
                </a>
            </div>
        </div>

        <div class="level">
            <div class="level-item">
                <a href='/dashboard'>
                    <button class="button mr-3" type="submit" name="edit_password" value="edit_password">HOME</button>
                </a>
            </div>
        </div>

    </body>

</html>