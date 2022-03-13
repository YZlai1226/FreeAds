<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Caterogy</title>
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
            <p class="is-size-3 has-text-danger px-2 pt-2 ">New Category</p>
        </div>
    </div>


    <body>

        <div class="level">
            <div class="level-item">
                <form action="/admin/addCategory" method="post" class="form-group">
                    @csrf
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <label for="name">Name: </label>
                    <input type="text" class="form-control" placeholder="name of the category..." name="categoryName">
                    <br> <br>
                    <div class="level-item">
                    <button class="button" type="submit" name="add_category" value="Add category" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>