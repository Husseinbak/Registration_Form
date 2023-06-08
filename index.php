<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="Top"    >
        <img class="passport" src="Passport.jpg" alt="Passport">
        <a href="fetch.php">Entries</a>
    </div>
    <div class="container">
        <h1>Registration Form</h1>
        <form method="post" action="submit.php" onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="your name">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="your email">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone">
            <div class="form-row">
                <label for="gender">Gender:</label>
                <div class="form-radio-group">
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                </div>
            </div>


            <label for="language">Language:</label>
            <select id="language" name="language">
                <option value="">Select a language</option>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "form_details";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Fetch language data from the database
                $sql = "SELECT name FROM languages";
                $result = $conn->query($sql);
                
                // Populate the dropdown with language options
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                    }
                }
                $conn->close();
                ?>
            </select>
            <label for="zipcode">Zipcode:</label>
            <input type="text" id="zipcode" name="zipcode">
            <label for="about">About:</label>
            <textarea id="about" name="about" placeholder="Write about yourself"></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>






    <script>
        function validateForm() {
            var name = document.forms[0]["name"].value;
            var email = document.forms[0]["email"].value;
            var password = document.forms[0]["password"].value;
            var phone = document.forms[0]["phone"].value;
            var gender = document.forms[0]["gender"].value;
            var language = document.forms[0]["language"].value;
            var zipcode = document.forms[0]["zipcode"].value;

            if (name == "") {
                alert("Name must be filled out");
                return false;
            }

            if (email == "") {
                alert("Email must be filled out");
                return false;
            }

            if (password == "") {
                alert("Password must be filled out");
                return false;
            }

            if (phone == "") {
                alert("Phone number must be filled out");
                return false;
            }

            if (gender == "") {
                alert("Gender must be selected");
                return false;
            }

            if (language == "") {
                alert("Language must be selected");
                return false;
            }

            if (zipcode == "") {
                alert("Zipcode must be filled out");
                return false;
            }

            return true;
        }
    </script>



</body>
</html>
