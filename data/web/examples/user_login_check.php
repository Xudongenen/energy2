<?php

error_reporting( E_ALL & ~E_NOTICE );

 //获取输入参数
$password=$_POST["password"];
//echo $json;
// 参数检查



 //die("数据OK");
// 链接数据库
try
{
   $dbh = new PDO('mysql:host=mysql.ftqq.com;dbname=fangtangdb', 'php', 'fangtang');
   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "update `user` set `password` = ? where email ='1535941400@qq.com'";
   $sth = $dbh->prepare( $sql );
   $ret = $sth->execute( [ $password ] );
   $user = $sth->fetch(PDO::FETCH_ASSOC);
    //echo $user['password'];
    //echo $password;
   if( $password!=$user['password'] )
  //  if( $password!=18102011997)
   {
       // print_r( $user );
       echo("修改成功");
   }else{
        //Header("Location:examples/dashboard1.html");
        echo("修改失败");
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
