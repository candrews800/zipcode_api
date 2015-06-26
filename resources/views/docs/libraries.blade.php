<?php
$page = 'libraries';
?>

@extends('docs.template')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>API Libraries</h1>

            <h3 id="php" class="page-header">PHP</h3>
            <h4><strong>Installation</strong></h4>
            <div class="well">
                composer require candrews/zipcode
            </div>

            <h4><strong>Usage</strong></h4>
            <p><strong>Get Zipcode</strong></p>

<pre>
// Get Details About Zipcode
$zipcode = new Zipcode\Zipcode(33024);
$zipcode->get();

if($zipcode->hasError()){
    echo $zipcode->getError();
}

var_dump($zipcode); // Valid $zipcode
</pre>

            <p><strong>Get Zipcode w/ Nearby Zipcodes</strong></p>

<pre>
// Get Details About Zipcode
$zipcode = new Zipcode\Zipcode(33024);
$zipcode->get(15);

if($zipcode->hasError()){
    echo $zipcode->getError();
}

var_dump($zipcode->near); // Array of Zipcode Objects within 15 mi of 33024
</pre>

            <p><strong>Get Nearby Zipcodes w/ Details</strong></p>

<pre>
// Get Details About Zipcode
$zipcode = new Zipcode\Zipcode(33024);
$zipcodes = $zipcode->near(15);

if($zipcodes->hasError()){
    echo $zipcode->getError();
}

var_dump($zipcodes); // Array of Zipcodes within 15 mi of 33024
</pre>

            <p><strong>Get Nearby Zipcodes</strong></p>

<pre>
// Get Details About Zipcode
$zipcode = new Zipcode\Zipcode(33024);
$zipcodes = $zipcode->near(15, false);

if($zipcodes->hasError()){
    echo $zipcode->getError();
}

var_dump($zipcodes); // Array of Zipcodes within 15 mi of 33024, [33328, 33023, etc..]
</pre>

            <p><strong>Search for Zipcodes by Location Name</strong></p>

<pre>
// Get Details About Zipcode
$zipcode = new Zipcode\Zipcode();
$zipcodes = $zipcode->search("Hollywood, FL");

if($zipcodes->hasError()){
    echo $zipcode->getError();
}

var_dump($zipcodes); // Array of Zipcodes related to Hollywood, FL
</pre>

            <p><strong>Get Distance Between Two Zipcodes</strong></p>

<pre>
// Get Details About Zipcode
$zipcode = new Zipcode\Zipcode(33024);
$distance = $zipcode->distance(33328);

if($zipcodes->hasError()){
    echo $zipcode->getError();
}

var_dump($distance); // Distance between 33024 and 33328
</pre>
        </div>
    </div>

@stop