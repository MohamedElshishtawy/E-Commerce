<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>

    <style>
        table{
            text-align: center; 
            margin: 20px auto
        }
    </style>
</head>
<body>
    

    <div>
        <table border=1>
            <thead>
                <tr>
                    <th colspan="2">User Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{$user->phone}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$user->email}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th colspan="2">Order Info</th>
            </tr>
            <tr>
                <th>Name</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            @php( $proucts = $cart['cart'] )
            @foreach ( $proucts as $item)
                <tr>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->count}}</td>
                </tr>
            @endforeach
            <tr>
                <th>Total Price:</th>
                <th>{{$cart['total']}}</th>
            </tr>
        </tbody>
    </table>
</body>
</html>