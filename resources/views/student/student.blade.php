<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Student Payment Information</title>

        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>

        <div class="container">
            <br>
            <a href="{{url('student/pdfversion')}}" target="_blank" class="btn btn-danger">Convert to PDF</a>
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-responsive">
                    <caption><h2 style="text-align: center">Student Information</h2></caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (count($student)>0)
                        @foreach ($student as $stud)

                        <tr>
                            <td>{{$stud->id}}</td>
                            <td>{{$stud->name}}</td>
                            <td>{{$stud->amount}}</td>
                            <td><a href="{{url('student/pdfexport/'.$stud->id)}}" target="_blank" class="badge badge-info">PDF
                                    Export</a></td>
                        </tr>
                        @endforeach
                        @else
                        <td colspan="4">No record found</td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>

</html>