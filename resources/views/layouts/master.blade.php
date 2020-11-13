<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>@yield('title')</title>
  </head>
  <body>
    <div class="jumbotron text-center">
        <h1>@yield('header')</h1>
    </div>
    <div class="container text-center" style="margin-bottom: 200px">
        @yield('content')
    </div>

    <footer class="footer" style="position: fixed; left: 0; bottom: 0; padding: 50px; background-color: #e9ecef; width: 100%;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-11">
            <span class="text-muted">
              By: Cristóbal Sánchez Arisa
            </span>
          </div>
          <div class="col-sm-1" style="@yield('botoInici')">
            <button type="button" class="btn btn-dark" onclick="window.location.href='/'">Inici</button>
          </div>
        </div>
      </div>
        
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>