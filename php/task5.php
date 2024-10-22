<?php
include 'header.php';
?>

<div class="container">
    <h2>Task 5: Declare User Entity with getFullName()</h2>
    <p>Open the console (F12) to see the result.</p>
</div>

<script>
    // JSON with users
    var json = '[{"first_name":"John","last_name":"Mcwain"},{"first_name":"Bill","last_name":"Footer"}]';
    
    // Convert JSON into an array of objects
    var usersData = JSON.parse(json);
    
    // Create the User class
    class User {
        constructor(firstName, lastName) {
            this.firstName = firstName;
            this.lastName = lastName;
        }
        
        getFullName() {
            return this.firstName + ' ' + this.lastName;
        }
    }

    // Create an array of User objects
    var UsersList = usersData.map(function(userData) {
        return new User(userData.first_name, userData.last_name);
    });
    
    // Display full names of users in the console
    for(let i = 0; i < UsersList.length; i++) {
        console.log(i, UsersList[i].getFullName());
    }
</script>

<?php
include 'footer.php';
?>
