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

        .icon {
            margin-right: 5px;
        }
    </style>
    <title>Inquiry PDF</title>
</head>
<body>
<div class="container">
    <h1>{{$inquiries->name}}'s Inquiry</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Attribute</th>
            <th scope="col">Response</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Name</td>
            <td><i class="bi bi-person icon" style="color: blue;"></i>{{$inquiries->name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td><i class="bi bi-envelope icon" style="color: #6776f4;"></i>{{$inquiries->email}}</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><i class="bi bi-telephone-fill icon" style="color: #3e4f6f;"></i>{{$inquiries->phone}}</td>
        </tr>
        <tr>
            <td>Course of interest</td>
            <td><i class="bi bi-book-fill icon" style="color: #012970;"></i>{{$inquiries->interest}}</td>
        </tr>
        <tr>
            <td>How did they know about us</td>
            @if($inquiries->source == 'youtube')
                <td><i class="bi bi-youtube icon" style="color: red;"></i>Youtube</td>
            @elseif($inquiries->source == 'twitter')
                <td><i class="bi bi-twitter icon" style="color: blue;"></i>Twitter</td>
            @elseif($inquiries->source == 'facebook')
                <td><i class="bi bi-facebook icon" style="color: blue;"></i>Facebook</td>
            @elseif($inquiries->source == 'instagram')
                <td><i class="bi bi-instagram icon" style="color: orange;"></i>Instagram</td>
            @else
                <td><i class="bi bi-globe icon" style="color: blue;"></i>Website</td>
            @endif
        </tr>
        <tr>
            <td>Additional information</td>
            <td><i class="bi bi-journal-plus icon" style="color: #012970;"></i>{{$inquiries->message}}</td>
        </tr>
        <tr>
            <td>Date of Inquiry</td>
            <td><i class="bi bi-calendar-check-fill icon" style="color: #2c384e;"></i>{{$inquiries->created_at}}</td>
        </tr>
        <tr>
            <td>Creator of Inquiry</td>
            <td><i class="bi bi-person-fill-lock icon" style="color: #012970;"></i>{{$inquiries->logger}}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
