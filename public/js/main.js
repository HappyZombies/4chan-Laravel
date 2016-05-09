$(function(){
    function RandomBanner(){
        //I'm lazy
        var images = new Array("1.gif", "2.gif", "3.gif", "4.gif", "5.png", "6.gif");
        var imageNum = Math.floor(Math.random() * images.length);
        var baseUrl = document.location.origin;
        $('#bannerImg').attr('src', baseUrl+"/img/title/"+images[imageNum]);
    }

    var imageLinks = $('.threadImg-big[href$=".png"],  .threadImg-big[href$=".jpg"],  .threadImg-big[href$=".gif"], .threadImg-big[href$=".bmp"], .threadImg-big[href$=".PNG"]');

    if(imageLinks.children('img').length){
        imageLinks.children('img').each(function(){
            $(this).attr('title', 'Click to enlarge image.');
        });
        imageLinks.click(function(e){
            e.preventDefault();
            $(this).children('img').toggleClass('expandedImg');
            $(this).parent().toggleClass("threadThumbnail-push");
        });
    }


    $('.newThread span').click(function(){
        $('#newThread-form').show();
        return false;
    });

    $('.hideIcon').click(function(){
        $(this).next().toggle("fast");
        return false;
    });

    //GreenText code gotten from http://codepen.io/anon/pen/cHgmb , code has been modified!
    $.fn.tweetify = function() {
        this.each(function() {
            $(this).html(
                $(this).html()
                    .replace(/(^|\s)&gt;(.*?)(<br( )*(\/)?( )*>|\n|$)/g,'$1<span class="quote">>$2</span>$3')
            );
        });
        return $(this);
    };
    $("blockquote").tweetify();


    window.onload = RandomBanner;
});