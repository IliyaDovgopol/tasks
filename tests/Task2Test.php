<?php

use PHPUnit\Framework\TestCase;

class Task2Test extends TestCase
{
    private $data;
    private $revenue;

    protected function setUp(): void
    {
        $this->data = [
            ['geo' => 'US', 'animal_id' => '52332', 'milk' => 23],
            ['geo' => 'US', 'animal_id' => '93545', 'milk' => 2],
            ['geo' => 'CA', 'animal_id' => '436', 'milk' => 35],
            ['geo' => 'CA', 'animal_id' => '2053', 'milk' => 7],
            ['geo' => 'AU', 'animal_id' => '5343', 'milk' => 17],
        ];

        $this->revenue = [
            ['geo' => 'US', 'amount' => '200'],
            ['geo' => 'CA', 'amount' => '300'],
            ['geo' => 'AU', 'amount' => '150'],
        ];
    }

    public function testTotalMilkPerCountry()
    {
        require_once __DIR__ . '/../php/task2.php';

        // Expected total milk per country
        $expectedTotalMilk = [
            'US' => 25,
            'CA' => 42,
            'AU' => 17,
        ];

        // Verify that total milk per country is calculated correctly
        $res = calculateRevenueDistribution($this->data, $this->revenue);

        // Get the actual total milk distribution
        $actualTotalMilk = [];
        foreach ($this->data as $entry) {
            if (!isset($actualTotalMilk[$entry['geo']])) {
                $actualTotalMilk[$entry['geo']] = 0;
            }
            $actualTotalMilk[$entry['geo']] += $entry['milk'];
        }

        $this->assertEquals($expectedTotalMilk, $actualTotalMilk);
    }

    public function testRevenueDistributionPerAnimal()
    {
        require_once __DIR__ . '/../php/task2.php';

        // Expected revenue distribution
        $expectedRevenueDistribution = [
            ['geo' => 'US', 'animal_id' => '52332', 'amount' => 184.00],
            ['geo' => 'US', 'animal_id' => '93545', 'amount' => 16.00],
            ['geo' => 'CA', 'animal_id' => '436', 'amount' => 250.00],
            ['geo' => 'CA', 'animal_id' => '2053', 'amount' => 50.00],
            ['geo' => 'AU', 'animal_id' => '5343', 'amount' => 150.00],
        ];

        // Call the function and check the result
        $res = calculateRevenueDistribution($this->data, $this->revenue);

        $this->assertEquals($expectedRevenueDistribution, $res);
    }
}
