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
            <div class="row">
                <div class="col-md-6">
                    @include('includes.messages')
                    <form action="{{route('student.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group" {{ $errors->has('studname') ? 'has-error' : ''}}>
                            <label for="name">Student Name</label>
                            <input type="text" class="form-control" id="studname" name="studname"
                        placeholder="Enter Student Name" value="{{old('studname')}}" autofocus>
                                {!! $errors->first('studname', '<p style="color: red">:message</p>') !!}
                        </div>
                        <div class="form-group" {{ $errors->has('amount') ? 'has-error' : ''}}>
                            <label for="amount">Amount paid</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="{{old('amount')}}" maxlength="4">
                            {!! $errors->first('amount', '<p style="color: red">:message</p>') !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>

</html>