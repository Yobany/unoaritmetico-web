<h1>Hola {{$username}}</h1>

<p>Entra al siguiente enlace para reestablecer tu contrase&ntilde;a</p>
<a href="{{url('account/reset?token='.$activationLink)}}">{{url('account/reset?token='.$activationLink)}}</a>