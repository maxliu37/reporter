<!doctype html>
<html lang="zh-Hant-TW">

<head>
    {include file="header.tpl"}
</head>

<body>

    {include file="nav.tpl"}

    {if !{$sn}}
    <div class="img-container">
        <div class="container">
            <h1 class="pt-3">巷集談-街道新聞</h1>
            <div class="row mt-2">
                <div class="col-6">
                    <h5>以台南社大師生為主體寫作者的《巷集談-街道新聞》，秉持公民素人發聲 、開放以及非營利的宗旨，除希望培力更多公民記者、自由寫手之外，更希望以關注台南市未來城鄉永續發展過程中，保障公民參與審議的權利為精神，成為台南市公民傳播媒體的草根平台。</h5>
                </div>
            </div>
        </div>
    </div>
    {/if}


    <!-- 自動載入 $op 對應的樣板檔 -->
    {include file="op_`$op`.tpl"}

    {include file="footer.tpl"}

</body>

</html>