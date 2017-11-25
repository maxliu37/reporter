<div class="footer"> </div>
    <footer class="bg-dark text-white fixed-bottom">
        <div class="container">
                <div class="my-3 d-none d-sm-block">「臺南公民智庫」是一個全新的概念，有效地運用社大的公民教育場域、加上民間NGO、專業學者，成為一個具有研究與提供思考與政策方向的機構，並兼具有行動力及參與城市運作的社會機能。</div>
                <div class="my-1 d-block d-sm-none">「臺南公民智庫」</div>
            
        </div>


<script src="js/jquery-3.2.1.min.js "></script>
<script src="js/popper.min.js "></script>
<script src="js/bootstrap.min.js "></script>

<script type="text/javascript">
    $(document).ready(function () {
        var images = ['background1.jpg', 'background2.jpg', 'background3.jpg'];
        $('.img-container').css('background-image', 'url(images/' + images[Math.floor(Math.random() * images.length)] + ')');

        $(".img-container ").css('width', $(window).width());
        $(".img-container ").css('height', $(window).height());
    })

    $(window).resize(function () {
        $(".img-container ").css('width', $(window).width());
        $(".img-container ").css('height', $(window).height());
    })

</script>