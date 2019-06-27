<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body style="background-color: darkgray;">
<?php $this->beginBody() ?>

<nav class="navbar main-menu navbar-default" style="background-color: lightgray;">
    <div class="container">
        <div class="menu-content" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/public/images/logo.png" alt="" width="15%" style="margin-left: -40px; background-color: black;"></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase" style="float:right;">
                    <li><form role="search" method="get" id="searchform" action="#">
                                        <div>
                                            <input type="text" placeholder="Search and hit enter..." name="s" id="s"/>
                                        </div>
                                    </form></li>
                </ul>
                <div class="i_con">
                    <ul class="nav navbar-nav text-uppercase">
                        <?php if(Yii::$app->user->isGuest):?>
                            <li><a href="<?= Url::toRoute(['auth/login'])?>">Login</a></li>
                            <li><a href="<?= Url::toRoute(['auth/signup'])?>">Register</a></li>
                        <?php else: ?>
                            <?= Html::beginForm(['/auth/logout'], 'post')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->name . ')',
                                ['class' => 'btn btn-link logout', 'style'=>"padding-top:10px;"]
                            )
                            . Html::endForm() ?>
                        <?php endif; if(Yii::$app->user->identity->isAdmin):?>
                        <?= Html::beginForm(['/admin'], 'post')
                        . Html::submitButton('AdminPanel',['class' => 'btn btn-link logout', 'style' => 'padding-top:10px;']) . Html::endForm() ?>
                    <?php endif; ?>
                    </ul>
                </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>


<?= $content ?>


<footer class="footer-widget-section">
    
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
