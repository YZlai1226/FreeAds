<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <div class="columns is-mobile is-centered is-vcentered">
        <div class="column">
            <a href='/user/adForm'>
                <img src="/images/add.png" alt="Logo" style="max-height: 70px" class="mt-5 ml-6 " alt="">
            </a>
        </div>
    </div>
    <div class="columns is-mobile is-centered is-vcentered">
        <div class="column">
            <a href='/user/adForm'>
                <span class="is-size-5 mt-1 has-text-info"> &nbsp;&nbsp;&nbsp; Create a New Ad</span>
            </a>
        </div>
    </div>

    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item has-text-info">
                <a href='/dashboard/'><img src="/images/accueil.png" alt="Logo" style="max-height: 70px" class="mt-5 " alt=""></a>
            </div>

            <form class="navbar-item has-text-info" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <!-- {{ __('Log Out') }} -->
                    <img src="/images/exit.png" alt="Logo" style="max-height: 70px" class="mt-5 mr-5 " alt="">
                </a>
            </form>
        </div>
    </div>
</div>

<body>

    <div class="level">
        <div class="level-item">
            <p class="is-size-3 has-text-primary px-2 pt-2 ">Your information</p>
        </div>
    </div>
    <br>
    <div class="level">
        <div class="level-item">
            <a href='/user/userEdit'>
                <button class="button mr-3" type="submit" name="edit_password" value="edit_password">Edit your profile</button>
            </a>
        </div>
    </div>

    <form>
        <p class="is-size-5 has-text-info has-text-centered"><label for="name">Username </label></p>
        <p class="is-size-4  has-text-centered">{{$user->name}}</p>
        <br>
        <p class="is-size-5 has-text-info has-text-centered"><label for="email">E-mail </label></p>
        <p class="is-size-4  has-text-centered">{{$user->email}}</p>
        <br>
        <p class="is-size-5 has-text-info has-text-centered"><label for="phone">Phone </label></p>
        <p class="is-size-4  has-text-centered">{{$user->phone}}</p>
    </form>

    <br>




    <!-- ========================================  IF NO ADS  ============================================= -->

    <div class="level">
        <div class="level-item">
            <p class="is-size-3 has-text-info px-2 pt-2 "> ======================</p>
        </div>
    </div>
    <div class="level">
        <div class="level-item">
            <p class="is-size-3 has-text-primary px-2 pt-2 ">Your Ads</p>
        </div>
    </div>


    @if(count($UserAd) == 0)
    <input type=hidden name="hidden_id" value="$Hidden_user_id" hidden>
    <p class="is-size-5 has-text-info has-text-centered"><label for="name">You don't have any ads yet ... </label></p>

    <div class="level">
        <div class="level-item">
            <a href='/user/adForm'>
                <button class="button mr-3" type="submit" name="edit_password" value="edit_password">Add New</button>
            </a>
        </div>
    </div>


    @else
    <!-- ========================================  IF ADS  ============================================= -->
    <div class="level">
        <div class="level-item">
            <table class="show_ads">
                <thead>

                    <th>picture</th>

                    <th>details</th>

                    <th>location</th>

                    <th>price</th>

                    <th>verified_by_admin</th>

                    <th>action</th>

                </thead>


                @foreach($UserAd as $valueAd)
                <tbody>
                    <tr>
                        <td>
                            <br>
                            <img src="/storage/{{$valueAd->picture }}" alt="ad image" width="300">
                        </td>

                        <td>
                            <strong>{{$valueAd->title}}</strong>
                            <br>

                            <em>{{$valueAd->category}}</em>
                            <br>

                            <p class="description ellipsis">{{$valueAd->description}}</p>
                            <a href="#" onclick="myFunction({{$valueAd->id}})" id="show-more{{$valueAd->id}}">Read More</a>
                            <br>
                        </td>

                        <td>{{$valueAd->location}}</td>
                        <td>{{$valueAd->price}}€</td>
                        @if ($valueAd->admin_verified == '0')
                        <td><strong>pending...</strong></td>
                        @else
                        <td><strong>verified</strong></td>
                        @endif
                        <td>
                            <!-- <a href="/user/AdEdit"> -->
                            <form method="POST" action="/user/AdEdit">
                                @csrf
                                <input name="adID" type="hidden" value="{{ $valueAd->id }}">
                                <button class="button mr-3" type="submit" name="edit_ad" value="edit_ad" class="btn btn-primary">Edit</button>
                            </form>
                            <!-- </a> -->
                            <!-- </form> -->
                            <form method="POST" action="/user/AdDelete">
                                @csrf
                                <input name="adID" type="hidden" value="{{ $valueAd->id }}">
                                <button class="button mr-3" type="submit" name="delete_ad" value="delete_ad" class="btn btn-primary">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</body>
<br><br>

<div class="level">
        <div class="level-item">
        <a href='/user/adForm'>
            <img src="/images/add.png" alt="Logo" style="max-height: 70px" class="mt-5 ml-6 " alt="">
        </a>
    </div>
</div>


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