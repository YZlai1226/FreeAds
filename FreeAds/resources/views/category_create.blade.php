<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Categories</title>
</head>

<body>
    <form action="/admin/addCategory" method="post" class="form-group">
        @csrf
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <label for="name">Name: </label>
        <input type="text" class="form-control" placeholder="name of the category..." name="categoryName">
        <button type="submit" name = "add_category" value="Add category" class="btn btn-primary">Add</button>
        
    </form>
</body>

</html>