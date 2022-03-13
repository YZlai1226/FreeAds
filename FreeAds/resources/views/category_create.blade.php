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
        <img src="/images/Logo.png" alt="Logo" style="max-height: 70px" class="mt-5 mx-3">
    </div>

    <div class="text">
        <p class="is-size-1 has-text-primary px-2 pt-2 mr-6">FreeAds</p>
        <p class="is-size-4 has-text-info mb-3 mr-6">The best way to buy and sell!</p>
        </p>
    </div>

    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item has-text-info">
                <a href='/admin'><img src="/images/admin.png" alt="Logo" style="max-height: 50px" class="mt-5 " alt=""></a>
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
            <p class="is-size-3 has-text-danger px-2 pt-2 ">New Category</p>
        </div>
    </div>


    <body>

        <div class="level">
            <div class="level-item">
                <form action="/admin/addCategory" method="post" class="form-group">
                    @csrf
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <!-- <p class="is-size-5 has-text-info has-text-centered"><label for="name">Name </label></p> -->
                    <input type="text" class="form-control" placeholder="name of the category..." name="categoryName">
                    <br> <br>
                    <div class="level-item">
                        <button class="button mr-3" class="button" type="submit" name="add_category" value="Add category" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>