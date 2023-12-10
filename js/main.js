$(function(){
    var btn = $('#next');
    $('#check').on('click',function(){
        if(this.checked){
            btn.html('<a href="productlist.php">商品を選ぶ</a>');
            $('#next').css('opacity','1');
        } else {
            btn.html('商品を選ぶ');
            $('#next').css('opacity','0.5');
        }
    });

    if (navigator.userAgent.indexOf('Android') > 0) {
        let body = document.getElementsByTagName('body')[0];
        body.classList.add('Android');
    };

    if (navigator.userAgent.indexOf('iPhone') > 0) {
        let body = document.getElementsByTagName('body')[0];
        body.classList.add('iPhone');
    };

    // history.pushState(null, null, null); //ブラウザバック無効化
    // //ブラウザバックボタン押下時
    // $(window).on("popstate", function (event) {
    //     history.pushState(null, null, null);
    //     // window.alert('前のページに戻る場合は、「前に戻る」ボタンから戻ってください。');
    //     $(location).prop("href", "https://machinoma-online.com/productlist.php");
    // });
});