<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    <title>User Profile</title>
</head>

<body>

    <h1>Your information</h1>
    <a href='/dashboard'>HOME</a>
    <form>
        <p>Name: {{$user->name}}</p>

        <p>E-mail: {{$user->email}}</p>

        <p>telephone: {{$user->phone}}</p>
    </form>

    <a href='/user/userEdit'>
        <button type="submit" name="edit" value="editer">Edit your profile</button>
    </a>



    <br>
    <br>
    <br>
    <br>

    <!-- <a href='/user/userPublication/{{$user->id}}'> 
        <button type="submit" name="edit" value="publication">view your Ads</button><br><br> -->

    <!-- ========================================  all ads that this user has  ============================================= -->


    @if(count($UserAd) == 0)
    <input type=hidden name="hidden_id" value="$Hidden_user_id" hidden>
    <p>You don't have any ads yet ... </p><br><br>
    <a href="/user/adForm">Add New</a>

    @else

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
                <td><strong>peding...</strong></td>
                @else
                <td><strong>verified</strong></td>
                @endif
                <td>
                    <!-- <a href="/user/AdEdit"> -->
                    <form method="POST" action="/user/AdEdit">
                        @csrf
                        <input name="adID" type="hidden" value="{{ $valueAd->id }}">
                        <button type="submit" name="edit_ad" value="edit_ad" class="btn btn-primary">Edit</button>
                    </form>
                    <!-- </a> -->
                    <!-- </form> -->
                    <form method="POST" action="/user/AdDelete">
                        @csrf
                        <input name="adID" type="hidden" value="{{ $valueAd->id }}">
                        <button type="submit" name="delete_ad" value="delete_ad" class="btn btn-primary">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/user/adForm">Add New</a>

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