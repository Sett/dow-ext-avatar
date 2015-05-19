<a class="ow-dshb-a" href="?block=friends">
    <div class="ow-dshb-std-block">
        <div class="row ow-dshb-stat-title">
            <?=$this->user->getAttribute('nickname')?>
        </div>
        <div class="ow-dshb-stat-img-wrapper">
            <div class="row" style="text-align: center;">
                <img class="ow-dshb-ava" src="<?=$this->basePath . $this->user->getAttribute('avatar')?>" />
            </div>
        </div>
    </div>
</a>