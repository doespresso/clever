<h3>Уважаемые представители {{$user->company}}!</h3>
<h3>Благодарим Вас за регистрацию в системе {{Setting::get('site_name')}}</h3>
<p>Ваше имя пользователя для входа:  <b>{{$user->email}}</b><br/>
Пароль, указанный Вами при регистрации:  <b>{{$password}}</b><br/></p>
<hr/>
<p>{{Setting::get('ooo')}}<br/>
+7 {{Setting::get('tel1')}}<br/>
+7 {{Setting::get('tel2')}}<br/>
</p>