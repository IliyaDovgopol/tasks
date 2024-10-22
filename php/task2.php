<?php
include 'header.php';

// Data about revenue and milk production (can be left as is)
$revenue = [
    ['geo'=>'US', 'amount'=>'200'],
    ['geo'=>'CA', 'amount'=>'300'],
    ['geo'=>'AU', 'amount'=>'150'],
];

$data = [
    ['geo'=>'US', 'animal_id'=>'52332', 'milk'=>23],
    ['geo'=>'US', 'animal_id'=>'93545', 'milk'=>2],
    ['geo'=>'CA', 'animal_id'=>'436', 'milk'=>35],
    ['geo'=>'CA', 'animal_id'=>'2053', 'milk'=>7],
    ['geo'=>'AU', 'animal_id'=>'5343', 'milk'=>17],
];

// Function to calculate revenue distribution
function calculateRevenueDistribution($data, $revenue) {
    // 1. Calculate total milk for each country
    $total_milk = [];
    foreach ($data as $entry) {
        if (!isset($total_milk[$entry['geo']])) {
            $total_milk[$entry['geo']] = 0;
        }
        $total_milk[$entry['geo']] += $entry['milk'];
    }

    // 2. Create a new array with results
    $res = [];
    foreach ($data as $entry) {
        $geo = $entry['geo'];
        $animal_milk = $entry['milk'];
        $total_milk_for_geo = $total_milk[$geo];
        
        $revenue_for_geo = array_filter($revenue, function($r) use ($geo) {
            return $r['geo'] === $geo;
        });
        $revenue_for_geo = array_values($revenue_for_geo)[0]['amount'];
        
        $amount_for_animal = ($animal_milk / $total_milk_for_geo) * $revenue_for_geo;
        
        $res[] = [
            'geo' => $geo,
            'animal_id' => $entry['animal_id'],
            'amount' => round($amount_for_animal, 2)
        ];
    }

    return $res;
}

// Call the function to get the results
$res = calculateRevenueDistribution($data, $revenue);

// Display the results in a table
echo "<table>";
echo "<caption>Revenue Distribution by Animal</caption>";
echo "<tr><th>Geo</th><th>Animal ID</th><th>Amount</th></tr>";

foreach ($res as $row) {
    echo "<tr>";
    echo "<td>{$row['geo']}</td>";
    echo "<td>{$row['animal_id']}</td>";
    echo "<td>{$row['amount']}</td>";
    echo "</tr>";
}

echo "</table>";

include 'footer.php';
