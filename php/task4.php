<?php
include 'header.php';

// Define the variants and their rates (weights)
$variantsRate = [
    "variant 1" => 20,
    "variant 2" => 20,
    "variant 3" => 60
];

// Updated function that accepts an array of variants and their weights
function getVariant($variantsRate) {
    // Create an array for distributing probabilities
    $cumulative = [];
    $sum = 0;

    foreach ($variantsRate as $variant => $rate) {
        $sum += $rate;
        $cumulative[$variant] = $sum;
    }

    // Generate a random number between 0 and the sum of all rates
    $random = rand(0, $sum - 1);

    // Select a variant based on the generated number
    foreach ($cumulative as $variant => $limit) {
        if ($random < $limit) {
            return $variant;
        }
    }
}

// Output 100 variants
echo "<div class='container'>";
echo "<table>";
echo "<caption>Generating 100 variants based on their rate:</caption>";
echo "<tr><th>Iteration</th><th>Selected Variant</th></tr>";

for ($i = 0; $i < 100; $i++) {
    $variant = getVariant($variantsRate); // Pass the variants array
    echo "<tr><td>" . ($i + 1) . "</td><td>{$variant}</td></tr>";
}

echo "</table>";
echo "</div>";

include 'footer.php';
