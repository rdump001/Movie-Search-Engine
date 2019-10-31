<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/vendor/autoload.php';
use Elasticsearch\ClientBuilder;
$es = ClientBuilder::create()->setHosts(['localhost:9200'])->build();
?>