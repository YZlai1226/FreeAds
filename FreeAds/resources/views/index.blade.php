<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeAds</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->

</head>

<body>
    <div class="container">
        <h1 class="title">
            FreeAds
        </h1>
        <p class="subtitle">
            The better way to buy !
        </p>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-900 dark:bg-gray-100 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>

    
        <label class="category-select"> Choose a category:</label>
        <select name="categories" id="category-select">
            <option value="">--Please choose an option--</option>

            @foreach($categories as $valueCategory)

            <option>{{$valueCategory->name}}</option>
            @endforeach
        </select>
        <a href="/Category/{{$valueCategory->name}}">
                        <button type="submit" name="categories_filter" value="categories_filter" class="btn_categories_filter">Filter</button>
                    </a>



    @foreach($Ads as $valueAd)
    <table class="show_ads">

        <tr>

            <!-- <td>{{$valueAd->id}} </td> -->

            <td>
                <img src="{{ asset($valueAd->picture)}}" alt="ad image" width="300">
            </td>

            <td>
                <strong>{{$valueAd->title}}</strong> <br>

                <em>{{$valueAd->category}}</em> <br>

                {{$valueAd->description}} <br>
            </td>

            <td>{{$valueAd->location}} </br {{$valueAd->price}} </td>
                <br><br>

        </tr>
        @endforeach



    </table>

</html>