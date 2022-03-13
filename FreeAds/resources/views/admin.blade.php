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
        <img src="/images/Logo.png" alt="Logo" style="max-height: 70px" class="mt-5 mx-3">
    </div>

    <div class="text">
        <p class="is-size-1 has-text-primary px-2 pt-2 mr-6">FreeAds</p>
        <p class="is-size-4 has-text-info mb-3 mr-6">The best way to buy and sell!</p>
        </p>
    </div>
    <a class="navbar-burger mt-3 mr-3" id="burger">
                <span></span>
                <span></span>
                <span></span>
            </a>

    <div class="navbar-menu" id="nav-links">
        <div class="navbar-end">
            <div class="navbar-item has-text-info">
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
</div>
<script>
        const burgerIcon = document.querySelector('#burger');
        const navbarMenu = document.querySelector('#nav-links');

        burgerIcon.addEventListener('click', () => {
            navbarMenu.classList.toggle('is-active');
        });
    </script>

<!-- -->

<body>
    <!-- ===================================== category table ======================================= -->
    @if (isset($category))

        <div class="category is-large">
            <table class="table mx-auto is-striped is-hoverable">
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

    
        
        <section class="section">
            <div class="container">
                <div class="header"><strong>All Pending Ads . . .</strong></div>
                <!-- <table class="table is-striped is-hoverable"> -->

                <div class="columns head is-hidden-mobile">
                    <div class="column is-1"><strong>id</strong></div>
                    <div class="column is-2"><strong>picture</strong></div>
                    <div class="column is-5"><strong>details</strong></div>
                    <div class="column is-1"><strong>price</strong></div>
                    <div class="column is-2"><strong>action</strong></div>
                </div>

            </div>

            <div class="container">
                @foreach($ads as $valueAd)
                <div class="columns">


                    <div class="column is-1">{{$valueAd->id}} </div>
                    <div class="column is-2">
                        <div class="image">
                            <img src="/storage/{{$valueAd->picture }}" alt="ad image">
                        </div>
                    </div>
                    <div class="column is-5">
                        <strong>{{$valueAd->title}}</strong><br>
                        <em>{{$valueAd->category}}</em><br>
                        {{$valueAd->location}}<br>

                        <p class="description ellipsis">{{$valueAd->description}}</p>
                        <a href="#" onclick="myFunction({{$valueAd->id}})" id="show-more{{$valueAd->id}}">Read More</a>
                    </div>
                    <div class="column is-1">{{$valueAd->price}}€ </div>
                    <div class="column is-2">
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