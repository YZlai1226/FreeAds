<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

    <div class="navbar is-white">
        <div class="navbar-brand">
            <img src="/images/Logo.png" alt="Logo" style="max-height: 70px" class="mt-5 mx-3">
            
            <div class="text">
                <p class="is-size-1 has-text-primary px-2 pt-2">FreeAds</p>
                <p class="is-size-4 has-text-info mb-3">The best way to buy!</p>
            </p>
        </div>
        <a class="navbar-burger mt-3 mr-3s" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </div>
        <div class="navbar-menu" id="nav-links">
            <div class="navbar-end">
                @if ($admin === 1)
                <div class="navbar-item has-text-info has-text-right">
                    <a href='/admin'>Admin</a>
                </div>
                @endif
                <div class="navbar-item has-text-info has-text-right">
                    <a href='/user/adForm'>Add New Post</a>
                </div>
                <div class="navbar-item has-text-info has-text-right">
                    <a href='/user'>Profile</a>
                </div>
                <form class="navbar-item has-text-info has-text-right" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
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


    <!-- ============================== SEARCHBAR ================================ -->
    <div class="field is-grouped">
        <div class="control is-expanded">
            <form method="post" action="/dashboard/Search">
                @csrf
                <input class="input is-info ml-3 mt-1" type="text" name="search" placeholder="Search..">
        </div>
        <div class="control"></div>
        <button class="button mr-3" type="submit">Search</button>
        </form>
    </div>
    </div>
    <!-- ============================== FILTERS ================================ -->
    <div class="field is-horizontal">
        <form method="post" action="/dashboard/Filter">
            @csrf
            <label class="field-label is-normal ml-3"> Choose a category:</label>
            <select class="select" name="categories" id="category-select">
                <option value="Select_option">--Please select a category--</option>
                <option value="AllCategories">All categories</option>

                @foreach($categories as $valueCategory)

                <option value="{{$valueCategory->name}}">{{$valueCategory->name}}</option>
                @endforeach
            </select>
            <label class="field-label is-normal ml-3"> Order by:</label>

            <select class="select" name="filter" id="filter-select">
                <option value="Select_option">--Please select a filter--</option>
                <option value="orderByNew">Newest</option>
                <option value="orderByOld">Oldest</option>
                <option value="orderByAsc">Price Asc</option>
                <option value="orderByDesc">Price Desc</option>
            </select>
            <input class="button mx-3" type="submit" name="categories_filter" value="Filter" class="btn_categories_filter"></input>
        </form>
    </div>


    <!-- ============================== SHOW ADS ================================ -->

    <section class="section">
        <div class="container">
            @foreach($Ads as $valueAd)
            <div class="columns">

                <div class="column is-3">
                    <img src="/storage/{{$valueAd->picture }}" alt="ad image" width="300">
                </div>

                <div class="column is-7">

                    <strong>{{$valueAd->title}}</strong> <br>

                    <em>{{$valueAd->category}}</em> <br>
                    {{$valueAd->location}} </br>

                    {{Str::limit($valueAd->description, 150, $end='...')}} <br>
                    <a href="/ad/{{$valueAd->id}}" class="button" data-toggle="modal">See more</a>

                </div>

                <div class="column is-1">
                    <div class="is-size-5 mb-4"><br>{{$valueAd->price}}???
                    </div>
                </div>
                <br><br>

            </div>
            @endforeach
        </div>

    </section>


</body>

</html>