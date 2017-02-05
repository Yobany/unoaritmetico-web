<h1>Hola {{$username}}</h1>

<p>Este es tu link de confirmacion de cuenta</p>
<a href="{{url("/") . '/#!/auth/activate?token='.$activationLink}}">{{url("/") . '/#!/auth/activate?token='.$activationLink}}</a>