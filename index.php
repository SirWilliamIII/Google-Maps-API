<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container">
            
            <h1>Zipcode Finder</h1>
            <p>Enter a partial address to get the postcode. </p>
            <div id="message">
                
            </div>
            
            <form>
                <fieldset class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter partial address">
                </fieldset>
                <button id="find-postcode" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $("#find-postcode").click(function(e){
        e.preventDefault();


    $.ajax({
        url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + $("#address").val() + "&key=AIzaSyAorDM70Pk-4UHfmnsSOuEklsE4kVqOv0U",
        type: "GET",
        success: function(data){

            if(data["status"] != "OK"){
                $("#message").html('<div class="alert alert-warning" role="alert"> <strong>Zipcode could not be located</strong></div>');

            }
            $.each(data["results"][0]["address_components"], function(key, value){
                if(value["types"][0] == "postal_code"){
                    $("#message").html('<div class="alert alert-success" role="alert"><strong>Zipcode Located!</strong> <br>The zipcode is ' + value["long_name"] + '.</div>'); 
                }
            })
        }    
    })
})
    
    </script>
</body>
</html>