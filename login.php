<?php
if(isset($_POST["Log_in"]))
{
    if(!((isset($_POST["who"]))&&(isset($_POST["pass"]))))
    {
        die("User name and password are required");
    }
    $name_of_user=$_POST["who"];
    $salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
    $salted_password=$salt.$_POST["pass"];
    $comphash=hash("md5",$salted_password);
    if($stored_hash===$comphash)
    {
        header("location: https://phpweek8.herokuapp.com/game.php?name=".urlencode($name_of_user));
    }
    else
    {
        die("Incorrect Password");
    }
}

else
{
    echo"
    <!DOCTYPE html>
    <html lang=\"en\">
    <head>
        <title>
            Rahul porwal made RPS game
        </title>
        <meta charset=\"UTF-8\">
    </head>
    <body>
    <fieldset>
    <legend>
    The Login Form
    </legend>
    <form method=\"POST\" action=\"#\">
    <input type=\"text\" placeholder=\"Username\" name=\"who\">
    <input type=\"password\" placeholder=\"Password\" name=\"pass\">
    <input type=\"Submit\" name=\"Log_in\" value=\"Log In\">
    </form>
    </fieldset>
    </body>
    ";
}