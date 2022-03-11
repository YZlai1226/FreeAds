<h1>Vos informations</h1>
<form>
    <p>Nom: {{$user->name}}</p>

    <p>E-mail: {{$user->email}}</p>
 
    <p>téléphone: {{$user->phone}}</p>
</form>

<a href='/user/userEdit/{{$user->id}}'> 
<button type="submit" name="edit" value="éditer">Edit your profile</button>

<a href='/user/userPublication/{{$user->id}}'> 
<button type="submit" name="edit" value="publication">view your Ads</button>
