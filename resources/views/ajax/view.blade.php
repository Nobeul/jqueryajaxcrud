<!DOCTYPE html>
<html>

<head>
    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Products info </h3>
                </div>
                <div class="panel-body">
                    <!-- <div class="form-group">
                        <input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="Search" aria-label="Search">
                    </div> -->
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Quantity</th>
                                
                            </tr>
                        </thead>
                        @foreach($product as $pro)
                        <tbody>
                                <td class="text-center">{{$pro->product_name}}</td>
                                <td class="text-center">{{$pro->quantity}}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    
   
</body>

</html>