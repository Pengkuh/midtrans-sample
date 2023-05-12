<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>


  <h1>Hello, world!</h1>

  <form action="/notif" id="callback" method="POST">
    @csrf
    <input type="hidden" id="json_callback" name="json">
  </form>
  <button id="pay-button" class="btn btn-primary">Pay!</button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<Set your ClientKey here>"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
      // SnapToken acquired from previous step
      snap.pay('<?= $snapToken ?>', {
        // Optional
        onSuccess: function(result) {
          document.getElementById('json_callback').value = JSON.stringify(result);
          document.getElementById('callback').submit();
          alert("sukses");

        },
        // Optional
        onPending: function(result) {
          document.getElementById('json_callback').value = JSON.stringify(result);
          document.getElementById('callback').submit();
          alert("pending");
        },
        // Optional
        onError: function(result) {
          document.getElementById('json_callback').value = JSON.stringify(result);
          document.getElementById('callback').submit();
          alert("error");
        }
      })
    };
  </script>
</body>

</html>