<h1>Modofiez vos informations</h1>



<body>
    <form action="/user/editsubmit" method="post" class="form-group">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" class="form-control" value="{{$user->id}}" name="userID" hidden>
        <label for="name">Username:</label><br>
        <input type="text" id="name" name="name" value=" {{$user->name}}"><br>
        <label for="email">email:</label><br>
        <input type="email" id="email" name="email" value="{{$user->email}}"><br><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="{{$user->phone}}"><br><br>

        <button type="submit" name="edit_user" value="edit user" class="btn btn-primary">Submit</button>
    </form>

    <a href='/user/user_password/{{$user->id}}'> 
<button type="submit" name="edit_password" value="edit_password">change password</button>

