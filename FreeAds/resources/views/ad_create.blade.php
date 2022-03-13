<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit your ads </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="CSS/index.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<div class="navbar is-white">
    <div class="navbar-brand">
        <img src="/images/Logo.png" alt="Logo" style="max-height: 50px" class="mt-5 mx-3">
    </div>

    <div class="text">
        <p class="is-size-1 has-text-primary px-2 pt-2 mr-6">FreeAds</p>
        <p class="is-size-4 has-text-info mb-3 mr-6">The best way to buy and sell!</p>
        </p>
    </div>

    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item has-text-info">
                <a href='/user'><img src="/images/user.png" alt="Logo" style="max-height: 50px" class="mt-5 " alt=""></a>
            </div>

            <div class="navbar-item has-text-info">
                <a href='/dashboard/'><img src="/images/accueil.png" alt="Logo" style="max-height: 50px" class="mt-5 " alt=""></a>
            </div>

            <form class="navbar-item has-text-info" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <!-- {{ __('Log Out') }} -->
                    <img src="/images/exit.png" alt="Logo" style="max-height: 50px" class="mt-5 mr-5 " alt="">
                </a>
            </form>

        </div>
    </div>
</div>

<body>
    <div class="level">
        <div class="level-item">
            <p class="is-size-3 has-text-primary px-2 pt-2 ">Create a New Ad</p>
        </div>
    </div>

    <body>

        <div class="level">
            <div class="level-item">

                <body>
                    <form action="/user/addAds" method="post" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" class="form-control" value="{{$UserID}}" name="userID" hidden>


                        <p class="is-size-5 has-text-info "><label for="title">Image</label></p>

                        <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror">

                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <br> <br>
                        <p class="is-size-5 has-text-info "><label for="title">Title:</label></p>

                        <input type="text" class="form-control" placeholder="title of your ad..." name="adTitle" required><br><br>


                        <p class="is-size-5 has-text-info "> <label class="category-select">Category:</label></p>

                        <select name="adCategories" id="category-select" required>
                            <option value="">--Please choose a category--</option>


                            @foreach($categories as $valueCategory)

                            <option>{{$valueCategory->name}}</option>
                            @endforeach
                        </select>


                        <br><br>
                        <p class="is-size-5 has-text-info "> <label for="description">Description: </label></p>
                        <input type="text" class="form-control" placeholder="what about your ad..." name="adDes" required>
                        <br><br>
                        <p class="is-size-5 has-text-info"> <label for="price">Price </label><br></p>
                        <input type="number" class="form-control" min="0.00" max="10000000000.00" step="0.01" name="adPrice" required><br><br>




                        <p class="is-size-5 has-text-info "><label class="location-select">Location</label></p>


                        <select name="Location" id="location-select" required>
                            <option value="">--Please choose a location--</option>


                            @foreach($Location as $LocationData)

                            <option value="{{ $LocationData->location }}">{{ $LocationData->location }}</option>
                            @endforeach

                        </select><br><br>
                        <div class="level">
                            <div class="level-item">
                                <br>
                                <button class="button mr-3" type="submit" name="add_ads" value="Add ads" class="btn btn-primary">Add</button>
                            </div>
                        </div>

                    </form>

            </div>
        </div>
    </body>
</body>