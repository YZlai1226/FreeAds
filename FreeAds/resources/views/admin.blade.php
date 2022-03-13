<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="index.css" type="text/css">
    <title>Admin Page</title>
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
    <!-- <div class="level">
        <div class="level-item">
            <p class="is-size-3 has-text-danger px-2 pt-2 ">Administration</p>
        </div>
    </div> -->


    <div class="navbar is-white">
        <div class="navbar-brand">
            <img src="/images/Logo.png" alt="Logo" style="max-height: 70px" class="mt-5 mx-3">
        </div>

        <div class="text">
            <p class="is-size-1 has-text-primary px-2 pt-2">FreeAds</p>
            <p class="is-size-4 has-text-info mb-3">The best way to buy!</p>
            </p>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="navbar-item has-text-info">/a>
                @else
                <a href="{{ route('login') }}" class="navbar-item has-text-info">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="navbar-item has-text-info">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>

    <!-- ================================  content  =============================== -->

    <table class="table is-narrow is-fullwidth is-hoverable">
        <thead>
            <th>All Pending Ads . . .</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </thead>

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

                        @foreach($ads as $valueAd)
                        <div class="tbody has-text-centered">
                            <tr class="tr">


                            <tr>

                                <td>{{$valueAd->id}} </td>

                                <td>
                                    <figure class="image is-1by1">
                                        <img src="/storage/{{$valueAd->picture }}" alt="ad image" width="300px">
                                    </figure>
                                </td>

                                <td>{{$valueAd->title}} </td>

                                <td>{{$valueAd->category}} </td>

                                <td>
                                    <p class="description ellipsis">{{$valueAd->description}}</p>
                                    <a href="#" onclick="myFunction({{$valueAd->id}})" id="show-more{{$valueAd->id}}">Read More</a>
                                </td>

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

                    </table>
                </div>
            </div>
            <!-- ===================================== category table ======================================= -->
            <!-- <div class="level">
            <div class="level-item">
                <table class="table table-hover"> -->

            <!-- <thead> -->

            <table class="table table-hover">
                <thead>
                    <th>All categories </th>
                    <th></th>
                    <th></th>

                </thead>
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
            <a href='/dashboard'>HOME</a>


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
            <script>
                function myFunction(id) {
                    var button = document.getElementById("show-more" + id);
                    var description = button.previousElementSibling;

                    if (button.innerHTML === "Read More") {
                        button.innerHTML = "Show less";
                        description.classList.remove("ellipsis");
                    } else {
                        button.innerHTML = "Read More";
                        description.classList.add("ellipsis");
                    }
                }
            </script>

        </body>

</html>