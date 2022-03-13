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
                <a href="{{ url('/') }}" class="navbar-item has-text-info">HOME</a>
                <form class="navbar-item has-text-info" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- ============================== SHOW AD ================================ -->


    <table class="table is-narrow is-fullwidth is-hoverable">
        <div class="tbody">
            <tr class="tr">

                <td>
                    <img src="/storage/{{$valueAd[0]->picture}}" alt="ad image" width="300">
                </td>
                <td>
                    <strong>{{$valueAd[0]->title}}</strong> </td>
                    <td>
                    <em>{{$valueAd[0]->category}}</em></td>
                <td>

                    {{$valueAd[0]->location}}</td>
                <td>


                    {{$valueAd[0]->description}} </td>

                <td><br>{{$valueAd[0]->price}}€
                </td>
                <td><br>{{$valueUser[0]->email}}€
                </td>
                <td><br>{{$valueUser[0]->phone}}
                </td>
                <br><br>

            </tr>

        </div>

    </table>


</html>