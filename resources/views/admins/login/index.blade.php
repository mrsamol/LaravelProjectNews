<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="col-xs-12 col-sm-12 col-md-6 offset-3">
    
    <h2 class="text-center mt-5 mb-3">News</h2>
    <form action="{{route('loginto')}}" method="post">
      @csrf
      <div class="card">
        <div class="card-header">Sign In</div>
        <div class="card-body">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required="" placeholder="Email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required="" placeholder="Password" class="form-control">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body>
</html>
