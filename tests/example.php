<?php 

require 'vendor/autoload.php';

use Barzo\Password\Generator;

echo Generator::generateRu() . "\n";
echo Generator::generateRuTranslit() . "\n";
echo Generator::generateEn() . "\n";
