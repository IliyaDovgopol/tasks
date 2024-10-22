<?php

use PHPUnit\Framework\TestCase;

class Task3Test extends TestCase
{
    private $timeList;
    private $targetDate;
    private $timezone;

    protected function setUp(): void
    {
        // Initialize data
        $this->timeList = [
            1681109075, // 2023-04-09
            1680925475, // 2023-04-07
            1681001075, // 2023-04-08
            1681128000, // 2023-04-10
            1678250675  // 2023-03-08
        ];

        $this->targetDate = '2023-04-07';
        $this->timezone = new DateTimeZone('America/New_York');
    }

    public function testFilterTimestampsByTargetDate()
    {
        // Include the code from task3.php
        require_once __DIR__ . '/../php/task3.php';

        // Expected results
        $expected = [
            [
                'timestamp' => 1680925475,
                'date' => '2023-04-07 23:44:35'
            ]
        ];

        // Check that the filtered timestamps match the expected results
        $this->assertEquals($expected, $selectedTimes);
    }

    public function testNoMatchingTimestamps()
    {
        // Include the code from task3.php
        require_once __DIR__ . '/../php/task3.php';

        // Set a different target date with no matching timestamps
        $this->targetDate = '2023-04-06';

        // Re-run the filtering
        $selectedTimes = [];
        foreach ($this->timeList as $timestamp) {
            $date = new DateTime("@$timestamp");
            $date->setTimezone($this->timezone);

            if ($date->format('Y-m-d') === $this->targetDate) {
                $selectedTimes[] = [
                    'timestamp' => $timestamp,
                    'date' => $date->format('Y-m-d H:i:s')
                ];
            }
        }

        // Expect no matching timestamps
        $this->assertEmpty($selectedTimes);
    }

    public function testTimezoneConversion()
    {
        // Include the code from task3.php
        require_once __DIR__ . '/../php/task3.php';

        // Test a specific timestamp
        $timestamp = 1680925475; // America/New_York
        $date = new DateTime("@$timestamp");
        $date->setTimezone($this->timezone);
        
        // Expected date after conversion
        $expectedDate = '2023-04-07 23:44:35';

        // Verify the conversion is correct
        $this->assertEquals($expectedDate, $date->format('Y-m-d H:i:s'));
    }
}
