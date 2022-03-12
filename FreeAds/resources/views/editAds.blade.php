<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Ad</title>
</head>

<body>


    <form action="/user/editAdsconfirm" method="post" class="form-group" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" class="form-control" value="{{$UserAd->user_id}}" name="userID" hidden>
        <input type="hidden" class="form-control" value="{{$UserAd->id}}" name="AdID" hidden>
        <label for="picture">Picture:</label><br>
        <img src="/storage/{{$UserAd->picture }}" alt="ad image" width="300" required><br><br>

        <label for="">update your image: </label><br>
        <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror"><br><br>

        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="title">*Title:</label><br>
        <input type="text" id="title" name="title" value="{{$UserAd->title}}" required><br><br>


        <label class="category-select">*Category:</label><br>
        <select name="categories" id="category-select">
            <option>{{$UserAd->category}}</option>

            @foreach($categories as $valueCategory)

            <option>{{$valueCategory->name}}</option>
            @endforeach
        </select>

        <br> <br> <label for="description">*Description:</label><br>
        <input type="text" id="description" name="description" value="{{$UserAd->description}} " required><br><br>

        <label for="Price">*Price:</label><br>
        <input type="number" id="Price" name="Price" min="0.00" max="10000000000.00" step="0.01" value="{{$UserAd->price}}" required><br><br>


        <label class="location-select">*Location:</label>
        <br>
        <select name="Location" id="location-select">
            <option>{{$UserAd->location}}</option>

            @foreach($location as $LocationData)

            <option>{{ $LocationData->location }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit" name="edit_user" value="edit user" class="btn btn-primary">Confirm</button><br><br>
    </form>

    <a href='/user/{{$UserAd->user_id}}'>Back to Profile</a>
</body>

</html>