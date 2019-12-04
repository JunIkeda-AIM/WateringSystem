<?php
$filepath = "./plant_status_data.csv";
$n_data = 20;
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
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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
            <li class="active"><a href="./report.php">Report</a></li>
            <li><a href="./set.php">Setting</a></li>
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
            <h3 class="subtitle">Report</h3>
            <p>
            <h4>土中湿度の遷移</h4>
            <?php
            $j = 0;
            $file_ = new SplFileObject($filepath);
            $file_->setFlags(SplFileObject::READ_CSV);
            foreach($file_ as $row_) {
              $j = $j + 1;
            }
            if($j <= $n_data) {
              $n_data = $j;
            }
            ?>
              <div class="container" style="padding-top:50px;">
                <div id="myfirstchart" style="height: 250px;">
                  <script>
                    new Morris.Line({
                    element: 'myfirstchart',
                    data: [
                      <?php
                      $file = new SplFileObject($filepath);
                      $file->setFlags(SplFileObject::READ_CSV);
                      $ymin = 0;
                      $ymax = 120;
                      $js =  "";
                      $file = new SplFileObject($filepath);
                      $file->setFlags(SplFileObject::READ_CSV);
                      $k = 0;
                      foreach($file as $row) {
                        $k = $k + 1;
                        if ($k > $j - $n_data and $k < $j) {
                          $moisture = round(intval($row[1]) / 750.0 * 100);
                          $js = $js."{ date: '".substr($row[0], 0, 19)."', moisture: '".$moisture."' },";
                        }
                      }
                      $js = mb_substr($js, 0, -1);
                      echo $js;
                      ?>
                    ],
                    xkey: 'date',
                    ykeys: ['moisture'],
                    labels: ['土中湿度'],
                    ymin: <?php echo $ymin ?>,
                    ymax: <?php echo $ymax ?>,
                    postUnits: '%',
                    resize: true,
                    });
                  </script>
                </div>    
              </div>
            </p>
            <p>
            <br />
            <br />
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
