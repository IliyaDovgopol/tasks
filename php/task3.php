<?php
include 'header.php';

$timeList = [
    1681109075,
    1680925475,
    1681001075,
    1681128000,
    1678250675
];

// Target date
$targetDate = '2023-04-07';

// Timezone
$timezone = new DateTimeZone('America/New_York');

// Create an array to store the results
$selectedTimes = [];

// Loop through each timestamp
foreach ($timeList as $timestamp) {
    // Convert timestamp to DateTime object
    $date = new DateTime("@$timestamp");
    $date->setTimezone($timezone); // Set the timezone
    
    // Check if the date matches the target date
    if ($date->format('Y-m-d') === $targetDate) {
        $selectedTimes[] = [
            'timestamp' => $timestamp,
            'date' => $date->format('Y-m-d H:i:s')
        ];
    }
}

// Display the result as a table
echo "<table>";
echo "<caption>Timestamps for 2023-04-07 in America/New_York</caption>";
echo "<tr><th>Timestamp</th><th>Date and Time</th></tr>";

if (!empty($selectedTimes)) {
    foreach ($selectedTimes as $row) {
        echo "<tr>";
        echo "<td>{$row['timestamp']}</td>";
        echo "<td>{$row['date']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>No timestamps found for 2023-04-07.</td></tr>";
}

echo "</table>";

include 'footer.php';
?>
