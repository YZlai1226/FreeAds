<body>
    <form action="/user/editpasswordsubmit" method="post" class="form-group">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" class="form-control" value="{{$user->id}}" name="userID" hidden>


        <label for="password">new password:</label><br>
        <input type="text" name="password" class="password" minlength="8" required><br><br>


        <label for="password_confirmation">new password confirmation:</label><br>
        <input type="text" name="password_confirmation" class="password_confirmation" minlength="8" required ><br><br>


        <button type="submit" name="edit_user" value="edit user" class="btn btn-primary">Submit</button>
    </form>