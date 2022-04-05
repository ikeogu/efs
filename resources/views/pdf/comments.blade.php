<!doctype html>
<html>
<head>
  <meta charset="utf-8">
	<title>Commments</title>
	<style type="text/css">
  	body{font:20px/1.4 Arial, Helvetica, sans-serif; text-align: center; color:#333; }
  	h1{color:#09c; line-height: 1.1em; font-weight: normal;}
    span{color:#333; display: block; font-size:0.8em;}
	</style>
</head>
<body>
    <div>
         <p> {{$C->name}} | {{$C->description}} |  {{$T->name}} | {{$T->description}} </p>
          <table class="table table-striped table-bordered" style="width:100%">
           
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Result Comment</th>
                  <th>Head Academcs Remark</th>
                  
                </tr>
              </thead>
              <tbody>
                  
               
                    @foreach($comments as $key =>$st)
                     <tr  >
                  <td scope="row">{{ $key + 1 }}</td>
                  <td>{{ $st->student->name}}</td>
                 
                  <td>{{ $st->comment}}</td>
                  <td>{{ $st->hcomment}}</td>
                 
                  
                </tr>
               @endforeach
              </tbody>
        </table>
    </div>

</body>
</html>
