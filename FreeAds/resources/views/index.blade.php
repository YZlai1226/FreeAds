<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeAds - Menu </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="CSS/index.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>



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
                <a href="{{ url('/dashboard') }}" class="navbar-item has-text-info">Dashboard</a>
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




    <!-- ============================== SEARCHBAR ================================ -->
    <div class="field is-grouped">
        <div class="control is-expanded">
            <form method="post" action="/Search">
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
        <form method="post" action="/Filter">
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

    @foreach($Ads as $valueAd)
    <table class="table is-narrow is-fullwidth is-hoverable">
        <div class="tbody">
            <tr class="tr">
                <!-- <td>{{$valueAd->id}} </td> -->

                <td>
                    <img src="{{ asset('images/'.$valueAd->picture) }}" alt="ad image" width="300">
                </td>

                <td>
                    <strong>{{$valueAd->title}}</strong> <br>

                    <em>{{$valueAd->category}}</em> <br>
                    {{$valueAd->location}} </br>

                    {{Str::limit($valueAd->description, 150, $end='...')}} <br>
                    <a href="{{ URL::to('/ad/{$ad->id}') }}" class="button" data-toggle="modal">See more</a>

                </td>

                <td><br>{{$valueAd->price}}€
                </td>
                <br><br>

            </tr>
            @endforeach
        </div>

    </table>
    </div>

</html>