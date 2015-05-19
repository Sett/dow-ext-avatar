<div class="col-md-2">
    <div class="row">
        <div class="col-md-12" style="text-align: center"><?=$this->user->getAttribute('nickname')?></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <img class="profile-header-ava" src="<?=$this->basePath . $this->user->getAttribute('avatar')?>" />
        </div>
    </div>
</div>