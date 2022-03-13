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

<div class="level">
    <div class="level-item">
        <div class="navbar is-white">
            <div class="navbar-brand">
                <img src="/images/Logo.png" alt="Logo" style="max-height: 70px" class="mt-5 mx-3">
            </div>
        </div>
    </div>
</div>

<body>
    <div class="level">
        <div class="level-item">
            <p class="is-size-3 has-text-primary px-2 pt-2 ">Edit your Ads</p>
        </div>
    </div>

    <div class="level">
        <div class="level-item">

            <form action="/user" method="post" class="form-group" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" class="form-control" value="{{$UserAd[0]->id}}" name="AdID" hidden>

                <p class="is-size-5 has-text-info "><label for="title">Image</label></p>
                <img src="/storage/{{$UserAd[0]->picture }}" alt="ad image" width="300" required><br><br>

                <p class="is-size-5 has-text-info "><label for="title">Change your Image</label></p>
                <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror"><br><br>

                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <p class="is-size-5 has-text-info "><label for="title">Title</label></p>
                <input type="text" id="title" name="title" value="{{$UserAd[0]->title}}" required><br><br>


                <p class="is-size-5 has-text-info "><label for="title">Category</label></p>
                <select name="categories" id="category-select">
                    <option>{{$UserAd[0]->category}}</option>

                    @foreach($categories as $valueCategory)

                    <option>{{$valueCategory->name}}</option>
                    @endforeach
                </select>
                <br><br>
                <p class="is-size-5 has-text-info "><label for="title">Description</label></p>
                <input type="text" id="description" name="description" maxlength="1500" value="{{$UserAd[0]->description}} " required><br><br>

                <p class="is-size-5 has-text-info "><label for="title">Price</label></p>
                <input type="number" id="Price" name="Price" min="0.00" max="10000000000.00" step="0.01" value="{{$UserAd[0]->price}}" required><br><br>

                <p class="is-size-5 has-text-info "><label for="name">Phone</label></p>
                <input type="text" class="form-control" placeholder="where to contact you" name="adPhone" required>
                <br> <br>

                <p class="is-size-5 has-text-info "><label for="title">Location</label></p>
                <select name="Location" id="location-select">
                    <option>{{$UserAd[0]->location}}</option>

                    @foreach($location as $LocationData)

                    <option>{{ $LocationData->location }}</option>
                    @endforeach
                </select>
                <br><br>
                <div class="level">
                    <div class="level-item">

                        <button class="button mr-3" type="submit" name="edit_password" value="edit_password">Confirm</button>
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="level">
        <div class="level-item">
            <br>
            <a href='/user'>
                <button class="button mr-3" type="submit" name="edit_password" value="edit_password">Back to Profile</button>
            </a>
        </div>
    </div>
</body>

</html>