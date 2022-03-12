<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <form action="/user/editConfirm" method="post" class="form-group">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" class="form-control" value="{{$category->id}}" name="categoryId" hidden>
        <label for="name">Name: </label>
        <input type="text" class="form-control" value="{{$category->name}}" name="categoryName">
        <button type="submit" name = "edit_category" value="edit category" class="btn btn-primary">Confirm</button>
    </form>




</body>

</html> -->