@if ($errors->any())
    <p style="color: red">{{ $errors->first() }}</p>
@endif

<form method="POST" action="{{ route('login.store') }}">
    @csrf
    <input name="email" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Password">
    <button>Login</button>
</form>

