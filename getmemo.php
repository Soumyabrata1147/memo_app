<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='index.css'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memos</title>
</head>
<body>
    <a href='submit.html'><i class='fa fa-plus'></i></a>
    <?php
    session_start();
    $servername='localhost';
$user='root';
$password='';
$dbname='memo';
$con=mysqli_connect($servername,$user,$password,$dbname);
if(!$con){
    die("cannot connect".mysqli_connect_error());
}else{
//echo "success";
//show total memos
$total_memos="SELECT * FROM memolist WHERE name='".$_SESSION['name']."'";
$total_memos_query=mysqli_query($con,$total_memos);
$total_memos_row_count=mysqli_num_rows($total_memos_query);
echo "<div class='nav'><p>Memos(".$total_memos_row_count.")</p></div>";
//show memos from db
$sql="SELECT * FROM memolist WHERE name='".$_SESSION['name']."'";
$query=mysqli_query($con,$sql);
while($rows=mysqli_fetch_assoc($query)){
    echo "<div class='messages'>";
    echo "<p class='head'>".$rows['heading']."</p>".$rows['message'];
    echo "</div>";
}
}
    ?>
</body>
</html>