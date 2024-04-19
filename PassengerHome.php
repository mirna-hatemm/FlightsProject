<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Passenger Home</title>
    <style>
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            /* Semi-transparent white background for content */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .profile-details {
            display: flex;
            flex-direction: column;
        }

        .profile-text {
            margin-bottom: 15px;
        }

        .profile-image-container {
            text-align: center;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .flight-list {
            margin-bottom: 20px;
        }

        .flight-list h2 {
            margin-bottom: 10px;
        }

        .flight-list ul {
            list-style: none;
            padding: 0;
        }

        .flight-list li {
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <?php session_start(); ?>
    <header class="header">
        <div class="header-content">
            <h1>Welcome, Passenger!</h1>
        </div>
    </header>

    <main class="container">
        <section class="profile">
            <div class="profile-details">
                <div class="profile-text">
                    <h2>Profile</h2>
                    <p><strong>Name:</strong><?php echo $_SESSION["name"] ?><span id="name"></span></p>
                    <p><strong>Email:</strong><?php echo $_SESSION["email"] ?><span id="email"></span></p>
                    <p><strong>Tel:</strong><?php echo $_SESSION["tel"] ?><span id="tel"></span></p>
                </div>
                <div class="profile-image-container">
                    <img src="profile.jpeg" alt="Passenger Image" class="profile-image">
                </div>
            </div>
            <a href="PassengerProfile.php" class="profile-edit-button">Edit Profile</a>
            <a href="PassengerFlightSearch.html" class="button">Search Flights</a>
            <a href="messages.php" class="button">message</a>
        </section>

        <section class="flight-list">
            <h2>Completed Flights</h2>
            <ul id="completed_flights" class="passenger-list"></ul>
        </section>

        <section class="flight-list">
            <h2>Current Flights</h2>
            <ul id="notcompleted_flights" class="passenger-list"></ul>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $.ajax({
        url: 'php/listNotCompleted.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);

            if (data.flights) {
                    var flightsList = document.getElementById('notcompleted_flights');
                    data.flights.forEach(function(flight) {
                        var listItem = document.createElement('li');
                        listItem.className = 'flight-item';
                        listItem.textContent = 'Flight ID: ' + flight.id + ', Name: ' + flight.name;
                        flightsList.appendChild(listItem);
                    });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching user data:', status, error);
        }
    });
    $.ajax({
        url: 'php/listCompleted.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);

            if (data.flights) {
                    var flightsList = document.getElementById('completed_flights');
                    data.flights.forEach(function(flight) {
                        var listItem = document.createElement('li');
                        listItem.className = 'flight-item';
                        listItem.textContent = 'Flight ID: ' + flight.id + ', Name: ' + flight.name;
                        flightsList.appendChild(listItem);
                    });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching user data:', status, error);
        }
    });
</script>

</body>

</html>