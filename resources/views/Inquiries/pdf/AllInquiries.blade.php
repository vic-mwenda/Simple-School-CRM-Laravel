<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .container h1{
            text-transform: uppercase;
            color: #012970;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid black;
        }

        .table th {
            background-color: #f0f0f0;
        }
    </style>
    <title>Inquiry PDF</title>
</head>
<body>
<div class="container">
      <table class="table">
        <thead>
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Course</th>
            <th scope="col">Source</th>
            <th scope="col">Message</th>
            <th scope="col">date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inquiries as $inquiry)
            <tr>
                <td>{{$inquiry->name}}</td>
                <td>{{$inquiry->email}}</td>
                <td>{{$inquiry->phone}}</td>
                <td>{{$inquiry->interest}}</td>
                <td>{{$inquiry->source}}</td>
                <td>{{$inquiry->message}}</td>
                <td>{{$inquiry->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>


