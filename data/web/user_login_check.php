<?php

error_reporting( E_ALL & ~E_NOTICE );

 //获取输入参数
$email=$_POST["email"];
$password=$_POST["password"];
//echo $json;
// 参数检查
if( strlen( $email ) < 1 ) die("Email 地址不能为空");
if( strlen( $password ) < 6 ) die("密码不能短于6个字符");
if( strlen( $password ) > 12 ) die("密码不能长于12个字符");

if( !filter_var( $email , FILTER_VALIDATE_EMAIL ) )
{
    die("Email 地址错误");
}

 //die("数据OK");
// 链接数据库
try
{
   $dbh = new PDO('mysql:host=mysql.ftqq.com;dbname=fangtangdb', 'php', 'fangtang');
   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql = "SELECT * FROM `user` WHERE `email` = ? LIMIT 1";

   $sth = $dbh->prepare( $sql );
   $ret = $sth->execute( [ $email ] );
   $user = $sth->fetch(PDO::FETCH_ASSOC);
    //echo $user['password'];
    //echo $password;
   if( $password!=$user['password'] )
  //  if( $password!=18102011997)
   {
       // print_r( $user );
       echo("错误的Email地址或者密码");
   }else{
        //Header("Location:examples/dashboard1.html");
        echo("登入成功");
    }



 //   <script>location='examples/dashboard1.html'</script>
//    session_start();
//    $_SESSION['email'] = $email;
//    $_SESSION['uid'] = $user['id'];
//
//    echo("登入成功<script>location='examples/dashboard1.html'</script>");
//
//    // header("Location: user_login.php");
//    die("用户注册成功<script>location='user_login.php'</script>");
}
catch( PDOException $Exception )
{
    echo 1;
//    if( $Exception->getCode() == 23000 )
//    {
//        die("Email地址已被注册");
//    }
//
//else
//    {
//        die( $Exception->getMessage() );
//    }
}
catch( Exception $Exception )
{
    echo 2;
//    die( $Exception->getMessage() );
}


// echo $sql;
