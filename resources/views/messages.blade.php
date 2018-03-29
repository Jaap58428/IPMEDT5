{{-- When a message is passed to the application it is displayed
on top of the page. In case of the alert it can be confirmed so it
disapears. --}}

@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="alert alert-bad">
      {{$error}}
    </div>
  @endforeach
@endif

@if (session('success'))
  <div class="alert alert-good">
    {{session('success')}}
  </div>
@endif

@if (session('error'))
  <div id="alert" class="alert alert-bad">
    <div class="big-exclam">!?</div>
    <div>{{session('error')}}</div>
    <button id="ok-btn" class="alert-confirm" type="button" name="button">Oké</button>
    <script type="text/javascript">
      var alert = document.getElementById('alert')
      document.getElementById('ok-btn').addEventListener("click", function () {
        document.getElementById('main').removeChild(alert);
      })
    </script>
  </div>
@endif
