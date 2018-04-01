<form method="POST" action="{{ route('register') }}">
      @csrf

<fieldset>
  <label for="name" >Naam</label>
  <div>
    <input required id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    @if ($errors->has('name'))
      <span class="invalid-feedback">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
    @endif
  </div>
</fieldset>

<fieldset>
  <label for="email" >Email</label>
  <div>
    <input required id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
    @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
  </div>
</fieldset>

<fieldset>
  <label for="password">Wachtwoord</label>
  <div>
    <input required id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
  </div>
</fieldset>

<fieldset>
  <label  for="password-confirm">Bevestig Wachtwoord</label>
  <div>
      <input required id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
  </div>
</fieldset>
<fieldset>
  <label for="isAdmin">Is administrator</label>
  <div>
    <select name="isAdmin">
      <option selected value="0">Nee</option>
      <option value="1">Ja</option>
    </select>
  </div>
</fieldset>
<fieldset>
  <button type="submit" class="btn btn-default">
      Registreer
  </button>
</fieldset>
</form>
