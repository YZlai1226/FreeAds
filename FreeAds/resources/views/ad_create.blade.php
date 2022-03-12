<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Ads </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="CSS/index.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="level">
        <div class="level-item">
            <p class="is-size-3 has-text-primary px-2 pt-2 ">Create a new Ad</p>
        </div>
    </div>

    <div class="level">
        <div class="level-item">

            <body>
                <form action="/user/addAds" method="post" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" class="form-control" value="{{$UserID}}" name="userID" hidden>

                    <div class="level">
                        <div class="level-item">
                            <p class="is-size-5 has-text-info mb-3"><label for="title">Image:</label></p>
                        </div>
                    </div>
                    <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror"><br><br>

                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="level">
                        <div class="level-item">
                            <p class="is-size-5 has-text-info mb-3"><label for="title">title:</label></p>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="title of your ad..." name="adTitle" required><br><br>

                    <div class="level">
                        <div class="level-item">
                            <p class="is-size-5 has-text-info mb-3"> <label class="category-select">Category:</label></p>
                        </div>
                    </div>
                    <select name="adCategories" id="category-select" required>
                        <option value="">--Please choose a category--</option>


                        @foreach($categories as $valueCategory)

                        <option>{{$valueCategory->name}}</option>
                        @endforeach
                    </select><br><br>


                    <div class="level">
                        <div class="level-item">
                            <p class="is-size-5 has-text-info mb-3"> <label for="description">description: </label></p>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="what about your ad..." name="adDes" required><br><br>

                    <div class="level">
                        <div class="level-item">
                            <p class="is-size-5 has-text-info mb-3"> <label for="price">price: </label><br></p>
                        </div>
                    </div>

                    <input type="number" class="form-control" min="0.00" max="10000000000.00" step="0.01" name="adPrice" required><br><br>

                    <div class="level">
                        <div class="level-item">
                            <br>
                            <a href='/user/user_password'>
                                <p class="is-size-5 has-text-info mb-3"><label for="name">Phone:</label></p>
                            </a>
                        </div>
                    </div>
                    <label class="location-select">Location:</label>
                    <br>
                    <select name="Location" id="location-select" required>
                        <option value="">--Please choose a location--</option>

                        @foreach($Location as $LocationData)

                        <option value="{{ $LocationData->location }}">{{ $LocationData->location }}</option>
                        @endforeach
                    </select><br><br>
                    <div class="level">
                        <div class="level-item">
                            <br>
                            <button type="submit" name="add_ads" value="Add ads" class="btn btn-primary">Add</button>
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