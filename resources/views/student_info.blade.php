<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bio Data</title>
    </head>

    <body>

        <h1>Student Biodata</h1>
        
    <a href="{{url('/dynamic_pdf/pdf')}}">Print PDF</a>
        <table>
            <caption><strong>Student Biodata</strong></caption>
            <thead>
                <tr>
                    <th>Last name</th>
                    <th>First name</th>
                    <th>Email Address</th>
                    <th>Phone</th>
                    <th>Registered Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student_info as $studinfo)
                <tr>
                    <td>{{$studinfo->lastname}}</td>
                    <td>{{$studinfo->firstname}}</td>
                    <td>{{$studinfo->email}}</td>
                    <td>{{$studinfo->phone}}</td>
                    <td>{{$studinfo->created_at}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </body>

</html>