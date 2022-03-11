<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Ads</title>
</head>
<body>
<form action="/user/addAds/{{$User->id}}" method="post" class="form-group">
        @csrf
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" class="form-control" value="{{$User->id}}" name="userID" hidden>
        <label for="picture">upload picture: </label>
        <input type="text" class="form-control" placeholder="Please upload the picture" name="adPicture" required> 
        <label for="title">title: </label>
        <input type="text" class="form-control" placeholder="title of your ad..." name="adTitle" required>
        <label class="category-select">Category:</label><br>
            <select name="adCategories" id="category-select" required>
            <option value="">--Please choose a category--</option>


                @foreach($categories as $valueCategory)

                <option>{{$valueCategory->name}}</option>
                @endforeach
            </select>

        <label for="description">description: </label>
        <input type="text" class="form-control" placeholder="what about your ad..." name="adDes" required>
        <label for="price">price: </label>
        <input type="text" class="form-control" placeholder="How much is it ?" name="adPrice" required>

        <label class="location-select">Location:</label>
            <br>
            <select name="Location" id="location-select" required>
            <option value="">--Please choose a location--</option>

                @foreach($location as $LocationData)

                <option>{{ $LocationData->location }}</option>
                @endforeach
            </select>


        <button type="submit" name = "add_ads" value="Add ads" class="btn btn-primary">Add</button>
        
    </form>
</body>
</html>