<?php
    // MySQLに接続
    require_once('dbconnect.php');

    // SQL更新
    if(isset($_POST['trading_id'])){
        $trading_id = $_POST['trading_id'];
        $stmt_up=$pdo->prepare("UPDATE customer_info set payment = :payment where trading_id = $trading_id");
        $stmt_up->execute(array(':payment'=>'済'));

        // メール送信
        $stmt = $pdo->query("SELECT * FROM customer_info WHERE trading_id = $trading_id");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $trading_id = $result['trading_id'];
        $introduction_id = $result['introduction_id'];
        $tel = $result['tel'];
        $email = $result['email'];
        $familyName = $result['familyName'];
        $yourName = $result['yourName'];
        $familyName_ja = $result['familyName_ja'];
        $yourName_ja = $result['yourName_ja'];
        $gender = $result['gender'];
        $birthday = $result['birthday'];
        $address_num = $result['address_num'];
        $address1 = $result['address1'];
        $address2 = $result['address2'];
        $address3 = $result['address3'];
        $address4 = $result['address4'];
        $product_name = $result['product_name'];
        $orderCount = $result['orderCount'];
        $product_price = $result['product_price'] . '円';
        $totalPrice = $result['totalPrice'];

        mb_language('Japanese');
        mb_internal_encoding('UTF-8');

        // 相手に送るメッセージ
        $to = $email;
        $subject = '決済完了とオンライン診療のお知らせ';
        $message = <<< EOM

        ご利用いただき、誠にありがとうございます。
        この度、ご注文いただいた商品の決済が完了いたしましたので、お知らせ申し上げます。

        ▼ご注文情報
        ご注文番号: $trading_id
        お名前: $familyName $yourName 
        郵送先: $address1$address2$address3$address4

        ▼重要なお知らせ
        ご注文いただいた商品の発送については、オンライン診療を受けていただく必要がございます。
        オンライン診療が完了しない場合、商品の発送は行われませんので、ご注意ください。

        オンライン診療の受け付けは、https://bit.ly/3QfMKI3 よりオンライン診療（一般内科・発熱外来）を選択してください。

        何かご不明点、ご質問等がございましたら、ご注文番号を添えて、ご登録のLINE公式にて、お問い合わせください。

        今後ともよろしくお願い申し上げます。

        EOM;
        $headers = "From:machinoma.online@gmail.com";
        // 相手に送るメッセージ
        mb_send_mail($to,$subject,$message,$headers);

        // 管理者に送るメッセージ
        $to2 = "machinoma.online@gmail.com";
        $subject2 = "決済完了とオンライン診療のお知らせ(管理者用)";
        $message2 = <<< EOM

        ご利用いただき、誠にありがとうございます。
        この度、ご注文いただいた商品の決済が完了いたしましたので、お知らせ申し上げます。

        ▼ご注文情報
        ご注文番号: $trading_id
        お名前: $familyName $yourName 
        郵送先: $address1$address2$address3$address4

        ▼重要なお知らせ
        ご注文いただいた商品の発送については、オンライン診療を受けていただく必要がございます。
        オンライン診療が完了しない場合、商品の発送は行われませんので、ご注意ください。

        オンライン診療の受け付けは、https://bit.ly/3QfMKI3 よりオンライン診療（一般内科・発熱外来）を選択してください。

        何かご不明点、ご質問等がございましたら、ご注文番号を添えて、ご登録のLINE公式にて、お問い合わせください。

        今後ともよろしくお願い申し上げます。

        EOM;
        $headers2 = 'From:'.$email;
        // 管理者に送るメッセージ
        mb_send_mail($to2,$subject2,$message2,$headers2);

        // 製作者に送るメッセージ
        $to3 = "k7dworks@gmail.com";
        $subject3 = "新規注文の確定";
        $message3 = <<< EOM

        ご利用いただき、誠にありがとうございます。
        この度、ご注文いただいた商品の決済が完了いたしましたので、お知らせ申し上げます。

        ▼ご注文情報
        ご注文番号: $trading_id
        お名前: $familyName $yourName 
        郵送先: $address1$address2$address3$address4

        ▼重要なお知らせ
        ご注文いただいた商品の発送については、オンライン診療を受けていただく必要がございます。
        オンライン診療が完了しない場合、商品の発送は行われませんので、ご注意ください。

        オンライン診療の受け付けは、https://bit.ly/3QfMKI3 よりオンライン診療（一般内科・発熱外来）を選択してください。

        何かご不明点、ご質問等がございましたら、ご注文番号を添えて、ご登録のLINE公式にて、お問い合わせください。

        今後ともよろしくお願い申し上げます。

        EOM;
        $headers3 = 'From:'.$email;
        mb_send_mail($to3,$subject3,$message3,$headers3);
    }

    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        result = 0
    </body>
</html>