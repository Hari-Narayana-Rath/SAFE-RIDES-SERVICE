<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the input data from the form
    $pickup = $_POST['pickup'];
    $drop = $_POST['drop'];

    // Process the input data (you can perform any necessary operations here)

    // For demonstration purposes, let's just echo the input data
    // echo "Pickup Location: " . $pickup . "<br>";
    // echo "Drop Location: " . $drop . "<br>";
} else {
    // If the form is not submitted via POST method, show an error message
    echo "Error: Form submission method is not POST.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: #EEEEEE;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: rgba(49, 54, 63, 0.8);
            /* Adjust the alpha value to control transparency */
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .location-info {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .location-value {
            font-style: italic;
        }

        video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure video covers entire viewport */
            z-index: -1000;
        }

        .heading {
            position: relative;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <video autoplay loop muted>
        <source src="bookeddd.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="heading">
        <h1 style="color: black;">Booking details</h1>
    </div>
    <div class="container">
        <h2>Location Details:</h2>
        <div class="location-info">
            <label for="pickup">Pickup Location:</label><br>
            <span class="location-value"><?php echo isset($_POST['pickup']) ? $_POST['pickup'] : ''; ?></span>
        </div>

        <div class="location-info">
            <label for="drop">Drop Location:</label><br>
            <span class="location-value"><?php echo isset($_POST['drop']) ? $_POST['drop'] : ''; ?></span>
        </div>
    </div>
</body>

</html>
