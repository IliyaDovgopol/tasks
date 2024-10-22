<?php
include 'header.php';
?>

<div class="container">
    <table>
        <caption>Filtered Client Information</caption>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>

        <?php
        // Original JSON data
        $json = '[{"first_name":"John","last_name":"Worker","age":"34","gender":"male","phone":"1256634875","email":"john@gmail.com","geo":"AU","time":"1526486324"},{"first_name":"Bill","last_name":"Maker","age":"24","gender":"male","phone":"634523433","email":"bill@gmail.com","geo":"US","time":"1526486324"},{"first_name":"Susan","last_name":"Baker","age":"51","gender":"female","phone":"23453334","email":"susan.baker@gmail.com","geo":"AU","time":"1526486324"}]';

        // Keys we need
        $neededKeys = ['first_name', 'last_name', 'phone', 'email'];

        // Convert JSON to an associative array
        $clients = json_decode($json, true);

        // Function to filter one client's data
        function filterClientData($client, $neededKeys) {
            return array_filter($client, function($key) use ($neededKeys) {
                return in_array($key, $neededKeys);
            }, ARRAY_FILTER_USE_KEY);
        }

        // Filter data for all clients
        $filteredClients = array_map(function($client) use ($neededKeys) {
            return filterClientData($client, $neededKeys);
        }, $clients);

        // Display the result as a table
        foreach ($filteredClients as $client) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($client['first_name']) . "</td>";
            echo "<td>" . htmlspecialchars($client['last_name']) . "</td>";
            echo "<td>" . htmlspecialchars($client['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($client['email']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<?php
include 'footer.php';
?>
