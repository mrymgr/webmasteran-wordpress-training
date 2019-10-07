<?php

$errorList=[
    'username'=>['required'=>false,'allowed'=>false],
    'path'=>['required'=>false,'allowed'=>false]
];
$errorMessage=[
    'username'=>[
        'required'=>'نام کاربری را وارد کنید.',
        'allowed'=>'نام کاربری نامعتبر است.'
    ],
    'path'=>[
        'required'=>'مسیر را وارد کنید.',
        'allowed'=>'مسیر نامعتبر است.'
    ]
];
if(empty($_POST)){
    $username=$path=' ';
}else{
    $username=$_POST['username'];
    $path=$_POST['path'];
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($username))
        $errorList['username']['required']=true;
    else{
        $username=charAnalyse($username);
        if(! preg_match("/^[a-zA-Z ]{1,30}$/",$username))
            $errorList['username']['allowed']=true;
    }
    if(empty($path))
        $errorList['path']['required']=true;
    else{
        $path=charAnalyse($path);
        /*if(! preg_match("#^[a-zA-Z]$#",$path))
            $errorList['path']['allowed']=true;*/
    }
}
function charAnalyse($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
}
function errorCss ($field){
    if($GLOBALS['errorList'][$field]['required'] || $GLOBALS['errorList'][$field]['allowed']) 
        return 'error';
    else 
        return 'displayNone';
}
function ErrorMsg ($field){
    if($GLOBALS['errorList'][$field]['required'])
        return $GLOBALS['errorMessage'][$field]['required'];
    elseif($GLOBALS['errorList'][$field]['allowed'])
        return $GLOBALS['errorMessage'][$field]['allowed'];
    else return 'displayNone';
}
function hasFormError(){
    $errorArrayFields=['username','path'];
    $errorArrayTypes=['required','allowed'];
    foreach($errorArrayFields as $fields){
        foreach($errorArrayTypes as $types){
            if($GLOBALS['errorList'][$fields][$types]){
            return true;
            break;
            }
        }
    }
    return false;
}
function submit(){
    if(isset($_POST) && empty($_POST)
    && ! $GLOBALS['errorList']['username']['required']
    && ! $GLOBALS['errorList']['username']['allowed']
    && ! $GLOBALS['errorList']['path']['required']
    && ! $GLOBALS['errorList']['username']['allowed']
    )
        return true;
    else return false;

}
$path=getcwd()."\path\\".$path;
if(!is_dir($path)){
    if(mkdir($path))
        echo "مسیر وارد شده با موفقیت ایجاد شد.";
    else
        echo "ایجاد مسیر با شکست مواجه شد.";
}elseif(is_dir($path) && ! empty($_POST['path'])){
    rmdir($path);
    echo "مسیر وارد شده با موفقیت حذف شد.";
}
echo $path;
?>

<!DOCTYPE html>
<html lang="fa">
<head>
<title>Play With Path</title>
<?php include 'head.php' ?>
<link rel="stylesheet" href="../CSS/create-path.css"/>
</head>
<body>
<div class="container">
<p><span class="<?php echo hasFormError() ? 'error' : 'displayNone'; ?>">* فرم را تکمیل کنید.</span></p>
<form method="post" action="#" class="form-horizontal col-lg-5 col-lg-offset-4 ">
    <div class="">
        <label for="username" class="control-label">نام کاربری:</label>
        <span class="<?php echo errorCss('username') ?>">
            *<?php echo ErrorMsg('username') ?>
        </span>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo submit() ? '' : $username ?>">
    </div>
    <div class="">
        <label for="path" class="control-label">مسیر :</label>
        <span class="<?php echo errorCss('path') ?>">
            *<?php echo ErrorMsg('path') ?>
        </span>
        <textarea name="path" id="path" class="form-control" rows="10" cols="10" value="<?php echo submit() ? '' : $path ?>"></textarea>
    </div>
    <button type="submit" name="submit" id="submit" class="form-control btn btn-info">ثبت</button>
</form>
</div>
</body>
</html>
