<?php
$filepath = "/var/www/html/wateringSystem/device_options.csv";
?>
<!DOCTYPE html>
<html>
  <!-- ページ情報 -->
  <header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="./js/bootstrap.min.js"></script>
    <title>BDM</title>
    <link rel="stylesheet" href="./stylesheet.css">

  </header>
  <!-- ページ情報ここまで -->
  <!-- ページ本体 -->
  <body>
    <!-- ヘッダー -->
    <header>
      <div id="main-header">
        <h2>Waterint System</h2>
      </div>
      <div id="header" class="navbar navbar-default">
        <div class="navbar-header">
          <button class="navbar-toggle" data-toggle="collapse" data-target=".target">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Menu</a>
        </div>
        <div class="collapse navbar-collapse target">
          <ul class="nav navbar-nav">
            <li><a href="./index.html">Home</a></li>
            <li><a href="./report.php">Report</a></li>
            <li class="active"><a href="./set.php">Setting</a></li>
          </ul>
        </div>
      </div>
    </header>
    <!-- ヘッダーここまで -->
    <!-- メイン -->
    <div id="main" style="margin-left:20px; margin-right:20px;">
      <div class="row">
        <!-- サイドバー左  -->
        <div class="col-sm-2 hidden-xs">
          <div class="containt1">
            <div class="panel panel-default">
              <div class="panel-heading">
		            リンクメニュー
              </div>
              <div class="panel-body">
                <?php
                $filename = "/var/www/html/wateringSystem/link.txt";
                $fileobj = new SplFileObject($filename, 'r');
                $readdata = $fileobj->fread($fileobj->getSize());
                echo $readdata;
                 ?>
	            </div>
            </div>
          </div>
        </div>
        <!-- サイドバー左ここまで -->
        <!-- メインコンテンツ -->
        <div class="col-sm-7 col-xs-12">
          <div class="containt1">
            <h3 class="subtitle">Setting</h3>
            <p>
              <?php
                $mode = $_POST["mode"];
                $hour = $_POST["hour"];
                $minute = $_POST["minute"];
                $dry = $_POST["dry"];
                $ws = $_POST["ws"];

                if ($mode==null) {
                echo "Please input Mode<br />";
                echo "<a href='./set.php' class='btn btn-default'>Back</a>";
                exit();
                }

                if ($hour==null) {
                echo "Please input Hour<br />";
                echo "<a href='./set.php' class='btn btn-default'>Back</a>";
                exit();
                }
                if ($minute==null) {
                echo "Please input Minute<br />";
                echo "<a href='./set.php' class='btn btn-default'>Back</a>";
                exit();
                }
                if ($dry==null) {
                echo "Please input Dry<br />";
                echo "<a href='./set.php' class='btn btn-default'>Back</a>";
                exit();
                }
                if ($ws==null) {
                echo "Please input Watering seconds<br />";
                echo "<a href='./set.php' class='btn btn-default'>Back</a>";
                exit();
                }
                $option = $mode.",".$hour.",".$minute.",".$dry.",".$ws.",00";
                file_put_contents($filepath, $option);
              ?>
              <?php echo "<a href='./set.php' class='btn btn-default'>Complete!!</a>"; ?>
            </p>
          </div>
        </div>
        <!-- メインコンテンツここまで -->
      </div>
    </div>
    <!-- メインここまで -->
    <!-- フッター -->
    <footer>
      <p class="copyright">
        <small style="padding-left: 20px;">Copyright&copy; 2018 @JunIkeda All Rights Reserved.</small>
      </p>
    </footer>
    <!-- フッターここまで -->
  </body>
  <!-- ページ本体ここまで -->
