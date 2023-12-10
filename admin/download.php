<?php
    // データベース接続
    require_once('dbconnect.php');

    // ログイン
    // session_start();
    // セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
    // if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //     header("location: login.php");
    //     exit;
    // }

    // ログアウト
    // if(isset($_POST['logout'])) {
    //     session_destroy();
    //     echo 'ログアウトしました';
    //     header('Location:login.php');
    // }

    // csv出力
    if(isset($_POST['csvoutput'])){
        $now = new DateTime();
        // $yesterday = new DateTime('yesterday');
        // $yesterday_Data = $yesterday->format('Y-m-d H:i:s');
        // print($yesterday_Data) ;

        // 実行
        $rec = $pdo->prepare('SELECT * FROM customer_info WHERE payment = "済"');
        //WHERE created >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY)
        $rec->execute();
        $rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);
        //  AND created > $yesterday_Data

        $csvfilename ="";
        $csvfilename .= 'customerinfo';
        $csvfilename .= $now->format('Y_m_d');
        $fileNm = $csvfilename . ".csv";

        $outputs = '';
        foreach($rec_list as $rec_row){
            foreach($rec_row as $rec_val){
                $rec_val = mb_convert_encoding($rec_val,"SJIS","UTF-8");
                $rec_val = "=\"$rec_val\"";
                $outputs .= $rec_val . ",";
            }
            $outputs = rtrim($outputs,',')."\n";
        }

        file_put_contents('download.csv',$outputs);

        // ダウンロードするサーバのファイルパス
        $filepath = 'download.csv';
        // HTTPヘッダを設定
        header('Content-Type: application/octet-stream');
        header('Content-Length: '.filesize($filepath));
        header('Content-Disposition: attachment; filename=' . $fileNm);
       
        // ファイル出力
        readfile($filepath);
        
        exit();        
    }

    // データベース切断
    $db = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="scss/download.min.css">
    <title>csv出力ページ</title>
</head>
<body>
    <!-- <header>
        <p><a href="index.html">情報出力</a></p>
    </header> -->
    <section class="main">
        <div class="container">
            <!-- <h1 class="my-5">ようこそ、<b><?php echo htmlspecialchars($_SESSION["name"]); ?></b> 様</h1> -->
            <form action="download.php" method="post" id="form1">
                <div class="csv_import_textarea">
                    <input type="hidden" name="key" value="action">
                    <button name="csvoutput" type="submit">csvダウンロード</button>
                </div>
            </form>
            <!-- <p>
                <a href="logout.php" class="btn btn-danger ml-3">サインアウト</a>
            </p> -->
            <!-- <form action="" method="post">
                <input type="hidden" name="logout" value="logout">
                <input type="submit" value="ログアウト">
            </form> -->
        </div>
    </section>

    <!-- <footer>
        <div class="footer_container">
            <ul>
                <li><a href="row.html">特定商取引法に基づく表記</a></li>
                <li><a href="privacy_policy.html">プライバシーポリシー</a></li>
            </ul>
            <p class="copyright">&copy; メディカルエンハンス all rights reserved.</p>
        </div>
    </footer> -->
</body>
</html>