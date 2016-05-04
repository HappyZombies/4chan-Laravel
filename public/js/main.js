$(function(){
    function RandomBanner(){
        //I'm lazy
        var images = new Array("1.gif", "2.gif", "3.gif", "4.gif", "5.png");
        var imageNum = Math.floor(Math.random() * images.length);
        var baseUrl = document.location.origin;
        $('#bannerImg').attr('src', baseUrl+"/img/title/"+images[imageNum]);
    }
    window.onload = RandomBanner;
});