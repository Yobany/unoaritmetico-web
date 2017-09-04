<h1>Hola {{$username}}</h1>

<p>Entra al siguiente enlace para reestablecer tu contrase&ntilde;a</p>
<a href="{{url_conditional("/") . '/#/auth/reset?token='.$activationLink}}">{{url_conditional("/") . '/#/auth/reset?token='.$activationLink}}</a>