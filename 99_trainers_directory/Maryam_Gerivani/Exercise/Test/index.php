<?php
$style_file_array=[
    'Red'=>'red.css',
    'Green'=>'green.css',
    'Blue'=>'blue.css'
];
$is_query_param_set=false;
try{
$color=$_GET['color'];

if(isset($color) && !empty($color) && array_key_exists($color , $style_file_array))
{
    $is_query_param_set=true;
    $style='';
    switch ($color){
        case 'Red':
            $style=$style_file_array['Red'];
        break;
        case 'Blue':
            $style=$style_file_array['Blue'];
        break;
        case 'Green':
            $style=$style_file_array['Green'];
        break;
        default:
            echo "Error";
    }
}
}catch(Exeption $e){
    echo $e->get_message();
    echo "Enter an Option.";
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/main.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/<?php echo $is_query_param_set ? $style : 'default.css' ?>"/>
</head>
<body>
<div id="nav">
    <ul>
            <a href="Index.php">
                <div class="nav-li">
                    <li>Home</li>
                </div>
            </a>
            <a href="Development.php">
                <div class="nav-li">
                    <li>Development</li>
                </div>
            </a>
            <a href="Business.php">
                <div class="nav-li">
                    <li>Business</li>
                </div>
            </a>
            <a href="IT_Software.php">
                <div class="nav-li">
                    <li>IT & Software</li>
                </div>
            </a>
            <a href="Design.php">
                <div class="nav-li">
                    <li>Design</li>
                </div>
            </a> 
            <a href="Marketing.php">
                <div class="nav-li">
                    <li>Marketing</li>
                </div>
            </a>
            <a href="Fitness.php">
                <div class="nav-li">
                    <li>Fitness</li>
                </div>
            </a> 
            <a href="Music.php">
                <div class="nav-li">
                    <li>Music</li>
                </div>
            </a>
            <a href="Surprise-Box.php">
                <div class="nav-li">
                    <li>Surprise Box</li>
                </div>
            </a>
            <a href="Learning.php">
                <div class="nav-li">
                    <li>Learning</li>
                </div>
            </a>
    </ul>
</div>

<div id=main>
    <div id="form">
        <form method="GET">
            <select name="color">
            <option id="red">Red</option>
            <option id="green">Green</option>
            <option id="blue">Blue</option>
            </select>
            <input type="submit"/>
        </form>
    </div>
</div>

</body>
</html>