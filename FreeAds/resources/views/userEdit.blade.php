<h1>Modofiez vos informations</h1>



<body>
    <form action="/user/editsubmit" method="post" class="form-group">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" class="form-control" value="{{$user->id}}" name="userID" hidden>
        <label for="name">*Username:</label><br>
        <input type="text" id="name" name="name" value=" {{$user->name}}" required><br><br>
        <label for="email">*email:</label><br>
        <input type="email" id="email" name="email" value="{{$user->email}}" required><br><br>
        <label for="phone">*Phone:</label><br>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" value="{{$user->phone}}" required><br><br>
        <button type="submit" name="edit_user" value="edit user" class="btn btn-primary">Submit</button>
    </form>

    <a href='/user/user_password/{{$user->id}}'>
        <button type="submit" name="edit_password" value="edit_password">change password</button><br><br>
    </a>

<a href='/user'>Back to Profile</a>