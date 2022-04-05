<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
      table, th, td {
              border: 1px solid black;
        }
        table {
          width: 100%;
          border-collapse: collapse;
        }
  </style>
</head>
<body>
  <main>
    <header>
      
      <p>EmeraldField Students Password</p>
    </header>
    <section>
      
          <table>
            <tr>
              <td>Name</td>
              <td>Email</td>
              <td>Password</td>
            </tr>
            <tbody>
                @foreach($users as $item)
                  <tr>
                    <td> {{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->keep_track}}</td>
                  </tr>
              @endforeach
              
            </tbody>
          </table>
    </section>

  </main>


</body>
</html>

