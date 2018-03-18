<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="login-field">
        <label for="email">Email</label>
        <div>
            <input id="email" type="email" class="login-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <div class="wrong-login">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="login-field">
        <label for="password">Wachtwoord</label>
        <div>
            <input id="password" type="password" class="login-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="wrong-login">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="login-field">
      <label>
          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Onthoud mijn gegevens
      </label>
    </div>

    <div class="login-field">
      <button type="submit">Login</button>
    </div>
</form>
