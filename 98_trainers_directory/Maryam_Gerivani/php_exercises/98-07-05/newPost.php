<?php
date_default_timezone_set("Asia/Tehran");
$btnLoadCls="visible";
$btnBackCls="hidden";
$mainCls="hidden";
$btnOk=false;

var_dump( $_POST);
if(!isset($_POST['btnAction'])){
    $btnAction=$_POST['btnAction']="load";
}else
    $btnAction=$_POST['btnAction'];
var_dump( $btnAction);
echo "{$btnLoadCls} {$btnBackCls} {$mainCls}";
if(isset($btnAction) && $btnAction=="load"){
    /*$date=date_create();
    $df=date_format($date,"Y/m/d H:i:s");
    $uploadTime=date($df);
    
    $filePath="uploadTime.txt";
    if(isset($filePath) && is_file($filePath) && file_exists($filePath)){
        file_put_contents($filePath,$Time);
        //fclose($filePath);
    }else{
        fopen($filePath,"a");
        file_put_contents($filePath,"{$Time}\n");
        fclose($filePath);
    }
    $uploadTime=file_get_contents($filePath,0,) ;*/
    $Time=time();
    if(!isset($_COOKIE['uploadTime']) || empty($_COOKIE['uploadTime'])){
        setcookie("uploadTime",$Time);
    }
    echo date($_COOKIE['uploadTime'])."\n";
    echo time();
    $btnLoadCls="hidden";
    $btnBackCls="visible";
    $mainCls="visible";
    $btnOk=true;

    //echo $uploadTime;
    /*header("location:post.php");*/
}elseif(isset($btnAction) && $btnAction=="back"){
    header("Location:newPost.php");
    $uploadTime='';
    $btnLoadCls="visible";
    $btnBackCls="hidden";
    $mainCls="hidden";
}
function postDate(){
    $passed= time()-$_COOKIE['uploadTime'];
if($passed<60){
    $passedText="Just a second";
}elseif($passed>=60 && $passed<3600){
    $min=$passed/60;
    round($min);
    if($min==1){
        $passedText="{$min} minute ago";
    }else{
        $passedText="{$min} minutes ago";
}}elseif($passed>=3600 && $passed<(24*3600)){
    $hour=$passed/3600;
    if($hour=1)
        $passedText="{$hour} hour ago";
    else
        $passedText="{$hour} hours ago";
}elseif($passed>=(24*3600) && $passed<(7*24*3600)){
    $day=$passed/(24*3600);
    if($day=1)
        $passedText="{$day} day ago";
    else
        $passedText="{$day} days ago";
}elseif($passed>=(7*24*3600) && $passed<(4*7*24*3600)){
    $week=$passed/(7*24*3600);
    if($week=1)
        $passedText="{$week} week ago";
    else
        $passedText="{$week} weeks ago";
}elseif($passed>=(4*7*24*3600) && $passed<(12*4*7*24*3600)){
    $month=date("m d",UPLOADTIME);
    $passedText="{$month}";
}elseif($passed>=(12*4*7*24*3600)){
    $year=date("Y m d",UPLOADTIME);
    $passedText="{$year}";
}else
    echo "error";
    return $passedText;
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <?php //header("Location:php_exercises/98-06-29/head.php") ?>
    <title>Post</title>
    <style>
    .visible{
        display:inline-block;
    }
    .hidden{
        display:none;
    }
    </style>
</head>
<body>
    <form method="post" action="#">
    <div id="main" name="main" class="<?php echo $mainCls ?>" style="margin:0px auto ; width:auto" dir="rtl">
        <div id="image" style="width:300px ; height:300px">
            <img width="100%" src="../98-06-29/Image/Paul Bettany II.jpg"/>
        <div>
        <div id="caption" >
            <p >
            تئودور جان "تد" کزینسکی  زاده ۱۹۴۲ ، که یونابامبر نیز خوانده می‌شود، ریاضیدان، آنارشیست و قاتل زنجیره‌ای آمریکایی ست. او به خاطر نقدهای اجتماعی گسترده‌اش که با صنعت‌گرایی، فناوری مدرن و چپگرایان سیاسی مخالفت می‌کند شناخته می‌شود.
او از ۱۹۷۸ تا ۱۹۹۵ درگیر بمبگذاری در سرتاسر آمریکا علیه افراد مرتبط با فناوری مدرن بود، و بمب‌های متعددی را جاسازی یا پست کرد که نهایتاً منجر به کشته شدن سه نفر و زخمی شدن ۲۳ نفر دیگر شد.
            </p>
        </div>
        <div id="date">
            <p><?php echo postDate(); ?></p>
        </div>
    </div>

        <button name="btnAction" value="load" class="<?php echo $btnLoadCls ?>">Load</button>
        <button name="btnAction" value="back" class="<?php echo $btnBackCls ?>">Back</button>
    </form>
</body>
</html>