

<?php
$dbh = new PDO('mysql:host=localhost;dbname=acessaifsp;charset=utf8'
							, 'root'
							, '');

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
