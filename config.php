<?php$hostname = 'localhost';$username = 'root';$password = '';$DbName = 'inventory_management';$conn = new mysqli($hostname,$username,$password,$DbName);if ($conn->connect_error){    die('Connection Problem');}