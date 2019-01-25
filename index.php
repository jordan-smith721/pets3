<?php
/**
 * Created by PhpStorm.
 * User: Jsmit and Ean Daus
 * Date: 1/18/2019
 * Time: 10:06 AM
 */


//Turn on error reporting
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

$f3 = Base::instance();
$f3->set('colors', array('pink', 'green', 'blue'));

//Define a default route
$f3->route('GET /', function() {
    echo"<h1>My Pets</h1>";
    echo"<a href='order'>Order a Pet</a>";
});

//Define a parameterized route
$f3->route('GET /@animal', function($f3, $params) {
    $animal = $params['animal'];
    $noise = '';
    if($animal == 'dog')
    {
        $noise = "Woof";
    }elseif($animal == 'chicken')
    {
        $noise = "Cluck";
    }elseif($animal == 'cow')
    {
        $noise = "Moo";
    }elseif($animal == 'cat')
    {
        $noise = "Meow";
    }elseif($animal == 'pig')
    {
        $noise = "Oink";
    }
    else {
        $f3->error(404);
    }
    echo"<h1>$noise!</h1>";
});

//Define a form1 route
$f3->route('GET|POST /order', function() {
    $template = new Template();
    echo $template->render('views/form1.html');
});

//Define a form2 route
$f3->route('GET|POST /order2', function() {
    $_SESSION['animal'] = $_POST['animal'];
    $template = new Template();
    echo $template->render('views/form2.html');
});

//Define a results route
$f3->route('POST /results', function() {
    $_SESSION['color'] = $_POST['color'];
    $template = new Template();
    echo $template->render('views/results.html');
});

//Run fat free
$f3->run();