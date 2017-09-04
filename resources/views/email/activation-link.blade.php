<h1>Hola {{$username}}</h1>

<p>Este es tu link de confirmacion de cuenta</p>
<a href="{{url_conditional("/") . '/#/auth/activate?token='.$activationLink}}">{{url_conditional("/") . '/#/auth/activate?token='.$activationLink}}</a>