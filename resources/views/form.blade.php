<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
  <style>
    input[type=number] {
      border: none;
    }
  </style>
</head>

<body>
  <br><br><br><br><br><br><br><br><br><br>

  <div class="container row m-auto">
    <div class="col-6 m-auto ">
      <h3 class="m-auto">Biaya</h3>
      <h5>{{$harga}}</h5>

      <form action="/store" id="pay-form" method="post">
        @csrf
        <div class="mb-3">
          <input type="text" class="form-control" name="biaya" value="{{$harga}}">
          <button class=" btn btn-primary" type="submiy">submit</button>
        </div>
      </form>
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>

</html>