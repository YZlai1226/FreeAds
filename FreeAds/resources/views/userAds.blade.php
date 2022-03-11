<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @if(count($UserAd) == 0)
    <input type=hidden name="hidden_id" value="$Hidden_user_id" hidden>
    <p>You don't have any ads yet ... </p><br><br>
    <a href="/users/adForm/{{$Hidden_user_id}}">Add New</a>

    @else

    @foreach($UserAd as $valueAd)
    <table class="show_ads">
        <tr>
            <td>
                <br>
                <img src="{{ asset('images/'.$valueAd->picture) }}" alt="ad image" width="300">
            </td>

            <td>
                <strong>{{$valueAd->title}}</strong>
                <br>

                <em>{{$valueAd->category}}</em>
                <br>

                {{$valueAd->description}}
                <br>
            </td>

            <td>
                {{$valueAd->location}}
                <br>
                {{$valueAd->price}}€
                <br>
            </td>
            <td>
                <a href="/user/AdEdit/{{$valueAd->id}}">
                    <button type="submit" name="edit_ad" value="edit_ad" class="btn btn-primary">Edit</button>
                </a>
                <!-- </form> -->
                <a href="/user/AdDelete/{{$valueAd->id}}">
                    <button type="submit" name="delete_ad" value="delete_ad" class="btn btn-primary">Delete</button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>

    <a href="/users/adForm/{{$valueAd->user_id}}">Add New</a>


    @endif

</body>

</html>