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
              <form class="form-horizon" action="./insert_setting.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mode</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="mode" value=0 checked="checked">Auto detection of soil getting dry and watering mode.</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="mode" value=1>Set the time and watering mode.(not by detection of dry)</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Hour</label>
                    If not auto dection mode, the device watering at this time every day.
                    <div class="col-sm-10" style="margin-bottom:10px;">
                        <select class="form-control input-sm" name="hour">
                          <?php
                        for ($i=0; $i < 24; $i++) {
                          echo "<option value=".$i.">".$i."</option>";
                        }?>
                      </select>
                    </div>
                    <p><br /></p>
                    </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Minute</label>
                    If not auto dection mode, the device watering at this time every day.
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control input-sm" name="minute">
                        <?php
                        for ($i=0; $i <59 ; $i++) {
                            echo "<option value=".$i.">".$i."</option>";
                        }?>
                      </select>
                    </div>
                  </div>
                  <p><br /></p>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Dry</label>
                    Device detect soil getting dry if the moisture is under this value.
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control input-sm" name="dry">
                        <?php
                        for ($i=1; $i <= 100 ; $i++) {
                          if($i == 40) {
                            echo "<option value=".round($i/100*750)." selected=''>".$i." % (".round($i/100*750).")</option>";
                          } else{
                            echo "<option value=".round($i/100*750).">".$i." % (".round($i/100*750).")</option>";
                          }
                        }?>
                      </select>
                    </div>
                  </div>
                  <p><br /></p>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Watering seconds</label>
                    The device watering for this value every time.
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control input-sm" name="ws">
                        <?php
                        for ($i=1; $i <= 5 ; $i++) {
                          if($i == 3) {
                            echo "<option value=".$i." selected=''>".$i." s"."</option>";
                          } else {
                            echo "<option value=".$i.">".$i." s"."</option>";
                          }
                        }?>
                      </select>
                    </div>
                  </div>
                  <p><br /></p>
                  <button type="submit" class="btn btn-primary" name="button" style="margin-bottom:10px;">Set</button>
                </form>
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
