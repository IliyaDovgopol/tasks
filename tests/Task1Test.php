<?php

use PHPUnit\Framework\TestCase;

class Task1Test extends TestCase
{
    private $clients;
    private $neededKeys;

    protected function setUp(): void
    {
        // Initialize data
        $this->clients = [
            [
                'first_name' => 'John',
                'last_name' => 'Worker',
                'age' => '34',
                'gender' => 'male',
                'phone' => '1256634875',
                'email' => 'john@gmail.com',
                'geo' => 'AU',
                'time' => '1526486324'
            ],
            [
                'first_name' => 'Bill',
                'last_name' => 'Maker',
                'age' => '24',
                'gender' => 'male',
                'phone' => '634523433',
                'email' => 'bill@gmail.com',
                'geo' => 'US',
                'time' => '1526486324'
            ]
        ];

        $this->neededKeys = ['first_name', 'last_name', 'phone', 'email'];
    }

    public function testFilterClientData()
    {
        // Include the function from task1
        require_once __DIR__ . '/../php/task1.php';

        // Test filtering for the first client
        $filteredClient = filterClientData($this->clients[0], $this->neededKeys);

        $expected = [
            'first_name' => 'John',
            'last_name' => 'Worker',
            'phone' => '1256634875',
            'email' => 'john@gmail.com'
        ];

        $this->assertEquals($expected, $filteredClient);
    }

    public function testAllClientsFilteredCorrectly()
    {
        // Include the function from task1
        require_once __DIR__ . '/../php/task1.php';

        // Filter all clients
        $filteredClients = array_map(function ($client) {
            return filterClientData($client, $this->neededKeys);
        }, $this->clients);

        // Expected result after filtering
        $expected = [
            [
                'first_name' => 'John',
                'last_name' => 'Worker',
                'phone' => '1256634875',
                'email' => 'john@gmail.com'
            ],
            [
                'first_name' => 'Bill',
                'last_name' => 'Maker',
                'phone' => '634523433',
                'email' => 'bill@gmail.com'
            ]
        ];

        // Compare the filtering result with the expected one
        $this->assertEquals($expected, $filteredClients);
    }
}
