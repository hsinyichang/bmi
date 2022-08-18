<?php
/* echo "POST陣列的內容";
print_r($_POST);
echo "<BR>";
echo "get陣列的內容";
print_r($_GET); */

if(!empty($_GET) || !empty($_POST)){
    if(empty($_GET)){ //判斷$_GET是否為空,如果為空表示為POST的方式傳送
        $height=$_POST['height'];
        $weight=$_POST['weight'];
    }else{
        $height=$_GET['height'];
        $weight=$_GET['weight'];
    };


$bmi=round($weight/(($height/100)*($height/100)),1);

$result='';

if($bmi >= 28 ){
    $result= "肥胖";
}else if($bmi >= 24 && $bmi < 27.9){
    $result= "過重";
}else if($bmi >= 18.5 && $bmi < 24){
    $result= "健康";
}else if($bmi < 18.5){
    $result= "過輕";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>單一檔案式的BMI計算</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<ul class="bubble">
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
</ul>
<div class="body">
<?php
if(empty($_GET)  && empty($_POST)){//陣列值是空的就跑出表單
?>
    
    <form action="index.php" method="get">
    <div class="input">
        <div class="h1">BMI計算</div>
        <table>
            <tr>
                <td>身高(cm)：</td>
                <td><input type="number" name="height"></td>
            </tr>
            <tr>
                <td>體重(kg)：</td>
                <td><input type="number" name="weight"></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="計算BMI">
        </div>
    </div>
    </form>

<?php
}else{//陣列值填好後就跑出下面結果

?>
    <h1 style="font-size:3rem;text-align:center">
你的BMI值為:<?=$bmi;?>

</h1>
<h2 style="text-align:center">判定結果為:<?=$result;?></h2>

<div style="text-align:center">

    <a href="index.php"><button>回到BMI計算</button></a>
</div>

<?php
}
?>

<table class="table">
    <tr class="tr1">
        <td style="width: 140px;">體重範圍</td>
        <td style="width: 270px;">身體質量指數(BMI)</td>
    </tr>
    <tr class="tr2">
        <td>體重過輕</td>
        <td>BMI　<　18.5</td>
    </tr>
    <tr class="tr3">
        <td>正常範圍</td>
        <td>18.5　≦　BMI　<　24</td>
    </tr>
    <tr class="tr4">
        <td>異常範圍</td>
        <td>過重：24　≦　BMI　<　27.9 <br> 肥胖：BMI　≧　28</td>
    </tr>
</table>
</div>
</body>
</html>