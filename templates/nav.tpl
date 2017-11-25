<nav  class="navbar navbar-expand-md navbar-dark sticky-top bg-dark py-0">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">
            <img alt="巷談集 - 街道新聞" src="images/logo.png" class="img-fluid">
    </a>
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
        <a href="index.php" class="nav-link">首頁</a>
        <a href="index.php" class="nav-link">編輯精選</a>
        <a href="index.php" class="nav-link">街巷故事</a>
        <a href="index.php" class="nav-link">市井觀點</a>
        <a href="index.php" class="nav-link">私房知識塾</a>
        </ul>
        
        <ul class="navbar-nav">
        {if isset($smarty.session.username)}
            <a href="admin.php?op=article_form" class="nav-link">發佈</a>
            <a href="logout.php" class="nav-link">登出</a>
        {else}
            <a href="signup.php" class="nav-link">註冊</a>
            <a href="main_login.php" class="nav-link">登入</a>
        {/if}
        </ul>
    </div>
</nav>
