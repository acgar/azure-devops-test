<?php

namespace Acgar\AzureDevops\Test\Functional;

use PHPUnit\Framework\TestCase;

class SQLConnectionTest extends TestCase
{

    /**
     * @var false|resource
     */
    private $connection;

    protected function setUp(): void
    {
        $serverName = "sqlsrv";
        $connectionOptions = array(
            "Database" => "test",
            "Uid" => "sa",
            "PWD" => "jgRt64Slkjdfpoahk0121"
        );
        $this->connection = sqlsrv_connect($serverName, $connectionOptions);
        $sql = "CREATE TABLE Employees (Id INT IDENTITY(1,1) NOT NULL PRIMARY KEY, Name NVARCHAR(50), Location NVARCHAR(50));";
        sqlsrv_query($this->connection, $sql);
    }

    protected function tearDown(): void
    {
        $sql = "DELETE FROM Employees WHERE 1";
        sqlsrv_query($this->connection, $sql);
    }


    function testConnection()
    {
        $this->assertNotFalse($this->connection);
    }

    function testInsertAndSelect()
    {
        $tsql = "INSERT INTO Employees (Name, Location) VALUES (?,?);";
        $params = ['Jake', 'United States'];
        $getResults = sqlsrv_query($this->connection, $tsql, $params);
        $this->assertNotFalse($getResults, sqlsrv_errors() ?? '');
        $rowsAffected = sqlsrv_rows_affected($getResults);
        $this->assertEquals(1, $rowsAffected);
        sqlsrv_free_stmt($getResults);

        $tsql= "SELECT Id, Name, Location FROM Employees;";
        $getResults= sqlsrv_query($this->connection, $tsql);
        $this->assertNotFalse($getResults, sqlsrv_errors() ?? '');

        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
            $this->assertEquals('Jake', $row['Name']);
            $this->assertEquals('United States', $row['Location']);
        }
    }

}