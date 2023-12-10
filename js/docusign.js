$(function(){
    // $('#docusign').on('click',function(){
    //     $('#check').prop('disabled',false);
    // });

    // var btn = $('.cart-btn');
    // $('#check').on('click',function(){
    //     if(this.checked){
    //         btn.html('<input type="submit" name="submit" value="次に進む">');
    //         $('.cart-btn').css('opacity','1');
    //     } else {
    //         btn.html('<p id="next">次に進む</p>');
    //         $('.cart-btn').css('opacity','0.5');
    //     }
    // });

    if (navigator.userAgent.indexOf('Android') > 0) {
        let body = document.getElementsByTagName('body')[0];
        body.classList.add('Android');
    };

    if (navigator.userAgent.indexOf('iPhone') > 0) {
        let body = document.getElementsByTagName('body')[0];
        body.classList.add('iPhone');
    };

    history.pushState(null, null, null); //ブラウザバック無効化
    window.onpageshow = function(event) {
        if (event.persisted) {
          // bfcache発動時の処理
          window.location.reload();
          $(location).prop("href", "https://machinoma-online.com/productlist.php");
        }
      };
    //ブラウザバックボタン押下時
    $(window).on("popstate", function (event) {
        history.pushState(null, null, null);
        
        // window.alert('前のページに戻る場合は、「前に戻る」ボタンから戻ってください。');
        $(location).prop("href", "https://machinoma-online.com/productlist.php");
    });

    // if(navigator.userAgent.indexOf('safari') != -1){
    //     history.pushState(null, null, null); //ブラウザバック無効化
        
    //     //ブラウザバックボタン押下時
    //     // $(window).on("popstate", function (event) {
    //     //     history.pushState(null, null, null);
            
    //     //     // window.alert('前のページに戻る場合は、「前に戻る」ボタンから戻ってください。');
    //     //     $(location).prop("href", "https://machinoma-online.com/productlist.php");
    //     // });
    // }
});