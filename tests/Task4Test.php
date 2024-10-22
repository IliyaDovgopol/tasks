<?php

use PHPUnit\Framework\TestCase;

class Task4Test extends TestCase
{
    private $variantsRate;

    protected function setUp(): void
    {
        // Initialize the variants and their weights
        $this->variantsRate = [
            "variant 1" => 20,
            "variant 2" => 20,
            "variant 3" => 60
        ];
    }

    public function testGetVariantDistribution()
    {
        // Include the code from task4.php
        require_once __DIR__ . '/../php/task4.php';

        // Number of function calls for the simulation
        $iterations = 10000;

        // Array to count how many times each variant is selected
        $results = [
            "variant 1" => 0,
            "variant 2" => 0,
            "variant 3" => 0
        ];

        // Execute the function many times and record the results
        for ($i = 0; $i < $iterations; $i++) {
            $variant = getVariant($this->variantsRate); // Pass the variants array
            $results[$variant]++;
        }

        // Check that the frequency of each variant falls within the expected range
        $this->assertEqualsWithDelta($iterations * 0.2, $results["variant 1"], $iterations * 0.05);
        $this->assertEqualsWithDelta($iterations * 0.2, $results["variant 2"], $iterations * 0.05);
        $this->assertEqualsWithDelta($iterations * 0.6, $results["variant 3"], $iterations * 0.05);
    }
}
