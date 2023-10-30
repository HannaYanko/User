<?php
require 'vendor/autoload.php';

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

// Включаємо файл, де міститься клас User
require 'User.php';

$encoders = [new JsonEncoder()];
$normalizers = [new ObjectNormalizer()];

$serializer = new Serializer($normalizers, $encoders);

$i = new User();
$i->name = 'Ann';
$i->surname = 'Yanko';

$json = $serializer->serialize($i, 'json');
echo "Серіалізуємо: ";
echo $json . PHP_EOL;

$deserialized = $serializer->deserialize($json, User::class, 'json');
echo "Десеріалізуємо: ";
var_dump($deserialized);
