<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="{{asset('css/user.css')}}" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="navbar is-white">
        <div class="navbar-brand">
            <img src="/images/Logo.png" alt="Logo" style="max-height: 70px" class="mt-5 mx-3">

            <div class="text">
                <p class="is-size-1 has-text-primary px-2 pt-2 mr-6">FreeAds</p>
                <p class="is-size-4 has-text-info mb-3 mr-6">The best way to buy!</p>
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

    <script>
        const burgerIcon = document.querySelector('#burger');
        const navbarMenu = document.querySelector('#nav-links');

        burgerIcon.addEventListener('click', () => {
            navbarMenu.classList.toggle('is-active');
        });
    </script>

    <!-- =================================== YOUR INFOS ==================================== -->
    <section class="section">
                        <div class="field is-horizontal">
                <div class="box mr-5 px-5 py-5">

                    <p class="is-size-3 has-text-primary has-text-centered">Your information</p>
                    <br>
                    <a href='/user/userEdit'>
                        <div class="has-text-centered">
                            <button class="button mb-5" type="submit" name="edit_password" value="edit_password">Edit your profile</button>
                    </a>
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

            </div>


            <!-- ========================================  IF NO ADS  ============================================= -->
            <div class="column is-12 ml-5">
                <div class="field is-horizontal has-text-centered">
                    <p class="is-size-2 has-text-primary px-2 pb-5 has-text-centered">Your Ads</p>
        
                        <a href='/user/adForm'>
                            <img src="/images/add.png" alt="Logo" style="max-height: 70px" class="ml-6 " alt="">
                        </a>
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
                @foreach($UserAd as $valueAd)
                <div class="columns">


                    <div class="column is-3">
                        <img src="/storage/{{$valueAd->picture }}" alt="ad image" width="300">
                    </div>

                    <div class="column is-5">
                        <strong>{{$valueAd->title}}</strong>
                        <br>

                        <em>{{$valueAd->category}}</em>
                        <br>
                        {{$valueAd->location}}<br>

                        <p class="description ellipsis">{{$valueAd->description}}</p>
                        <a href="#" onclick="myFunction({{$valueAd->id}})" id="show-more{{$valueAd->id}}">Read More</a>
                        <br>
                    </div>
                    <div class="column is-1">

                        {{$valueAd->price}}€
                    </div>
                    <div class="column is-2 has-text-centered">

                        @if ($valueAd->admin_verified == '0')
                        <div><strong>pending...</strong></div>
                        @else
                        <div><strong>verified</strong></div>
                        @endif
                        <!-- <a href="/user/AdEdit"> -->
<br>

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

                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>


</body>
<br><br>


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