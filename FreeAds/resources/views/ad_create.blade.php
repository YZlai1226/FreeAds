<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Ads</title>
</head>

<body>
    <form action="/user/addAds" method="post" class="form-group" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" class="form-control" value="{{$UserID}}" name="userID" hidden>
        <!-- <label for="picture">upload picture: </label><br> -->
        <!-- <input type="text" class="form-control" placeholder="Please upload the picture" name="adPicture" required><br><br> -->
        <!-- <input type="file" name="image">
        <input type="submit" value="Upload"><br><br> -->
        <label for="">Image: </label><br>
        <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror"><br><br>

        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror


        <label for="title">title: </label><br>
        <input type="text" class="form-control" placeholder="title of your ad..." name="adTitle" required><br><br>
        <label class="category-select">Category:</label><br>
        <select name="adCategories" id="category-select" required>
            <option value="">--Please choose a category--</option>


            @foreach($categories as $valueCategory)

            <option>{{$valueCategory->name}}</option>
            @endforeach
        </select><br><br>

        <label for="description">description: </label><br>
        <input type="text" class="form-control" placeholder="what about your ad..." name="adDes" required><br><br>
        <label for="price">price: </label><br>
        <input type="integer" class="form-control" placeholder="How much is it ?" name="adPrice" required><br><br>

        <label class="location-select">Location:</label>
        <br>
        <select name="Location" id="location-select" required>
            <option value="">--Please choose a location--</option>

            @foreach($Location as $LocationData)

            <option value="{{ $LocationData->location }}">{{ $LocationData->location }}</option>
            @endforeach
        </select><br><br>


        <button type="submit" name="add_ads" value="Add ads" class="btn btn-primary">Add</button>

    </form>
    <br>
    <a href='/user'>Back to Profile</a>
</body>

</html>