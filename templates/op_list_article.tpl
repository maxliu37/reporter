<div class="container">
        <h1 class="my-3 text-center">最新文章</h1>
        <div class="row">
        {foreach $all as $article}
            <div class="col-sm-4">
                {assign var="cover" value="uploads/thumb_`$article.sn`.png"}
                {if file_exists($cover)}
                    <img src="{$cover}" alt="{$article.title}" class="rounded cover">
                {else}
                    <img src="https://picsum.photos/400/300?image={$article@index}" alt="{$article.title}" class="cover rounded">
                {/if}
                <h3 id="title_block"><a href="index.php?sn={$article.sn}"><abbr title="{$article.title}">{$article.title}</abbr></a></h3>
                <h5>{$article.summary}</h5>
            </div>
        {foreachelse}
            <h1>尚無內容</h1>
        {/foreach}
        </div>
    </div>