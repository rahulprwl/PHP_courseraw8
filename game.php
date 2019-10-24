<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>
            Rahul porwal made RPS game
        </title>
        <meta charset="UTF-8">
    </head>
    <body>
    <h1>Welcome <?php echo($_GET["name"]);?></h1>
        <fieldset>
            <legend>
               Game Play
            </legend>
            <form method="POST" action="#">
                <select name="chance">
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissor</option>
                <option value="3">Test</option>
                </select>
                <input type="Submit" placeholder="Submit" name="play">
            </form>
        </fieldset>
        <div>
        <?php 
        if(isset($_SESSION["result"]))
        {
            echo($_SESSION["result"]);
        }
        ?>
        </div>
    </body>
    </html>
<?php
function getresult($human,$computer)
{
    switch($computer)
    {
        case 0:
            switch($human)
            {
                case 0: return "Tie";
                case 1: return "You Win";
                case 2: return "You Lose";
            }
        case 1:
            switch($human)
            {
                case 1: return "Tie";
                case 2: return "You Win";
                case 0: return "You Lose";
            }
        case 2:
            switch($human)
            {
                case 2: return "Tie";
                case 0: return "You Win";
                case 1: return "You Lose";
            }
    }
}
if(isset($_REQUEST["logout.php"]))
{
    header("location: https://phpweek8.herokuapp.com/");
}
if(!isset($_REQUEST["name"]))
{
    die("Name parameter missing");
}
$Chance=array("Rock","Paper","Scissor");
$computer=rand(0,2);
$human=(isset($_REQUEST["chance"]))?$_REQUEST["chance"]:-1;
if(($human!=-1)&&($human<3))
{
    $outcome=getresult($human,$computer);
    $cc=$Chance[$computer];
    $hc=$Chance[$human];
    $_SESSION["result"]="Your Choice = $hc, Computer Choice = $cc Result = $outcome";
}
elseif($human==3)
{
    $msg="";
    for($i=0;$i<3;$i++)
    {
        for($j=0;$j<3;$j++)
        {
            $outcome=getresult($i,$j);
            $cc=$Chance[$i];
            $hc=$Chance[$j];
            $msg.="Your Choice = $hc, Computer Choice = $cc Result = $outcome<br>";
        }
    }
    $_SESSION["result"]=$msg;
}
?>