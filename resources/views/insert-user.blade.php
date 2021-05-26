<form method="post" action="{{route('insert')}}">
@csrf
<label>name</label>
<input type="text" name="name"/>
<label>email</label>
<input type="email" name="email"/>
<label>password</label>
<input type="password" name="password"/>
<button type="submit">save</button>
</form>
