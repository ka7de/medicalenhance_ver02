$(function(){
    var btn = $('#next');
    // $('#check').on('click',function(){
    //     if(this.checked){
    //         btn.html('<input type="submit" name="submit" value="次に進む">');
    //         $('.cart-btn').css('opacity','1');
    //     } else {
    //         btn.html('次に進む');
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
});