<!DOCTYPE html>
<html>

<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Live Search</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Products info </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="Search" aria-label="Search">
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Quantity</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

<script type="text/javascript">
    // $('#search').on('keyup', function() {
    //     $value = $(this).val();
    //     $.ajax({
    //         type: 'get',
    //         url: "{{URL::to('search')}}",
    //         data: {'search': $value},
    //         success: function(data) {
    //             $('tbody').html(data);
    //         }
    //     });
    // });

    //tags of jquery are shown here 
    $( function() {
        var availableTags = [ 
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
    ];
        
        $( "#search" ).autocomplete({
            source: availableTags
        });
  });
</script>
   
</body>

</html>