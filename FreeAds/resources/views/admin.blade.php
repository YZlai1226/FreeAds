<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/84f26d0d3c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/user.css')}}" type="text/css">
    <title>Admin Page</title>
</head>

<div class="navbar is-white">
    <div class="navbar-brand">
        <img src="/images/Logo.png" alt="Logo" style="max-height: 50px" class="mt-5 mx-3">
    </div>

    <div class="text">
        <p class="is-size-1 has-text-primary px-2 pt-2 mr-6">FreeAds</p>
        <p class="is-size-4 has-text-info mb-3 mr-6">The best way to buy and sell!</p>
        </p>
    </div>

    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item has-text-info">
                <a href='/dashboard/'><img src="/images/accueil.png" alt="Logo" style="max-height: 50px" class="mt-5 " alt=""></a>
            </div>

            <form class="navbar-item has-text-info" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <!-- {{ __('Log Out') }} -->
                    <img src="/images/exit.png" alt="Logo" style="max-height: 50px" class="mt-5 mr-5 " alt="">
                </a>
            </form>

        </div>
    </div>
</div>

<div class="level">
    
    <div class="navbar-item">
        <div class="navbar-end">
            @isset($ads)
            <a href="{{ url('/admin/Category_Management') }}" class="navbar-item has-text-info">Category Management</a>
            <a href="{{ url('/dashboard') }}" class="navbar-item has-text-info">HOME</a>
            @endisset
            @isset($category)
            <a href="{{ url('/admin') }}" class="navbar-item has-text-info">Back to Admin</a>
            <a href="{{ url('/dashboard') }}" class="navbar-item has-text-info">HOME</a>
            @endisset
        </div>
    </div>
</div>

<body>
    <!-- ===================================== category table ======================================= -->
    @if (isset($category))
    <nav class="level">
        <div class="level-item">
            <table class="table is-striped is-hoverable">
                <thead>
                    <th colspan="2">All categories </th>
                    <th>
                        <a href='/admin/adForm'>
                            <button class="AddButton mr-3 has-background-info" type="submit" name="add_category" value="add_category">
                                <strong>ADD NEW</strong>
                            </button>
                        </a>
                    </th>
                </thead>
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

                            <a href="/admin/edit/{{$value->id}}">
                                <button type="submit" name="edit_category" value="edit category" class="btn_edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            &nbsp;
                            <a href="/admin/delete/{{$value->id}}">
                                <button type="submit" name="delete_category" value="delete category" class="btn_delete">
                                    <i class="fas fa-times"></i>
                                </button>
                            </a>

                        </td>

                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

        <!-- ================================  content  =============================== -->
        @else

        <thead>
            <th colspan="5">All Pending Ads . . .</th>
        </thead>
        <section class="section">
            <div class="container">
                <!-- <table class="table is-striped is-hoverable"> -->

                <div class="columns">
                    <div class="column is-1">id</div>
                    <div class="column is-2">picture</div>
                    <div class="column is-5">title</div>
                    <div class="column is-1">price</div>
                    <div class="column is-1">action</div>
                </div>

            </div>

            <div class="container">
                @foreach($ads as $valueAd)
                <div class="columns">


                    <div class="column is-1">{{$valueAd->id}} </div>
                    <div class="column is-2">
                        <figure class="image is-128x128">
                            <img src="/storage/{{$valueAd->picture }}" alt="ad image" width="300px">
                        </figure>
                    </div>
                    <div class="column is-5">
                        <strong>{{$valueAd->title}}</strong><br>
                        <em>{{$valueAd->category}}</em><br>
                        {{$valueAd->location}}<br>

                        <p class="description ellipsis">{{$valueAd->description}}</p>
                        <a href="#" onclick="myFunction({{$valueAd->id}})" id="show-more{{$valueAd->id}}">Read More</a>
                    </div>
                    <div class="column is-1">{{$valueAd->price}}€ </div>
                    <div class="column is-1">
                        <a href="/admin/verify/{{$valueAd->id}}">
                            <span class="icon-text has-text-success">
                                <span class="icon">
                                    <i class="fas fa-check-square"></i>
                                </span>
                                <span>Verify</span>
                            </span>
                            </button>
                        </a>
                    </div>


                </div>
                @endforeach
            </div>
        </section>
        <!-- </table> -->






        <div class="level-item">
            {{$ads->links()}}
            <div>


                @endif
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