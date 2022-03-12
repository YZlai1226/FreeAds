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

<body>

    <body>



        <div class="navbar is-white">
            <div class="navbar-brand">
                <img src="/images/Logo.png" alt="Logo" style="max-height: 70px" class="mt-5 mx-3">
            </div>

            <div class="text">
                <p class="is-size-1 has-text-primary px-2 pt-2">FreeAds</p>
                <p class="is-size-4 has-text-info mb-3">The best way to buy!</p>
                </p>
            </div>
       
        </div>



        <div class="level">
            <div class="level-item">
                <p class="is-size-3 has-text-primary px-2 pt-2 ">Edit your Profile</p>
            </div>
        </div>

        <div class="level">
            <div class="level-item">

                <body>
                    <form action="/user/editsubmit" method="post" class="form-group">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" class="form-control" value="" name="userID" hidden>


                        <p class="is-size-5 has-text-info ml-6 pl-4"><label for="name">Username:</label></p>
                        <input type="text" id="name" name="name" value="" required><br><br>

                        <p class="is-size-5 has-text-info ml-6 pl-4"><label for="name">E-mail:</label></p>
                        <input type="email" id="email" name="email" value="" required><br><br>


                        <p class="is-size-5 has-text-info ml-6 pl-4"><label for="name">Phone:</label></p>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" value="" required><br><br>
                        <div class="level">
                            <div class="level-item">
                                <br>
                                <a href='/user/user_password'>
                                    <button class="button mr-3" type="submit" name="edit_user" value="edit user" class="btn btn-primary">Submit</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </body>
            </div>
        </div>
        <br>

        <div class="level">
            <div class="level-item">
                <a href='/user/user_password'>
                    <button class="button mr-3" type="submit" name="edit_password" value="edit_password">Change your Password</button>
                </a>
            </div>
        </div>

        <div class="level">
            <div class="level-item">
                <a href='/user/'>
                    <button class="button mr-3" type="submit" name="edit_password" value="edit_password">Back to Profile</button>
                </a>
            </div>
        </div>

        <br>
        <br>
        <a href='/user'>

        </a>