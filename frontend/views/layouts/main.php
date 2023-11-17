<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header-top-wrapper">
                        <div class="header-top-info">
                            <div class="email">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.95" height="13.4" viewBox="0 0 16.95 13.4">
                                        <g id="Mail" transform="translate(0.975 0.7)">
                                            <path id="Path_1" data-name="Path 1" d="M3.5,4h12A1.5,1.5,0,0,1,17,5.5v9A1.5,1.5,0,0,1,15.5,16H3.5A1.5,1.5,0,0,1,2,14.5v-9A1.5,1.5,0,0,1,3.5,4Z" transform="translate(-2 -4)" fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path>
                                            <path id="Path_2" data-name="Path 2" d="M17,6,9.5,11.25,2,6" transform="translate(-2 -4.5)" fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>olog.wetbise@mail.com</span>
                                </div>
                            </div>
                            <div class="cta">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.401" height="13.401" viewBox="0 0 13.401 13.401">
                                        <g id="Phone_Icon" data-name="Phone Icon" transform="translate(0.7 0.7)">
                                            <path id="Phone_Icon-2" data-name="Phone Icon" d="M14.111,10.984v1.806A1.206,1.206,0,0,1,12.8,14a11.956,11.956,0,0,1-5.207-1.849,11.754,11.754,0,0,1-3.62-3.613A11.9,11.9,0,0,1,2.117,3.313,1.205,1.205,0,0,1,3.317,2h1.81A1.206,1.206,0,0,1,6.334,3.036a7.719,7.719,0,0,0,.422,1.692A1.2,1.2,0,0,1,6.485,6l-.766.765a9.644,9.644,0,0,0,3.62,3.613l.766-.765a1.208,1.208,0,0,1,1.273-.271,7.76,7.76,0,0,0,1.7.422,1.205,1.205,0,0,1,1.038,1.222Z" transform="translate(-2.112 -2)" fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>+8801658 874521</span>
                                </div>
                            </div>
                        </div>
                        <div class="header-top-switcher">
                            <div class="language">
                                <select style="display: none;">
                                    <option data-display="English">English</option>
                                    <option value="1">Arabic</option>
                                    <option value="2">Aramaic</option>
                                    <option value="4">Bangla</option>
                                </select><div class="nice-select" tabindex="0"><span class="current">English</span><ul class="list"><li data-value="English" data-display="English" class="option selected">English</li><li data-value="1" class="option">Arabic</li><li data-value="2" class="option">Aramaic</li><li data-value="4" class="option">Bangla</li></ul></div>
                            </div>
                            <div class="currency">
                                <select style="display: none;">
                                    <option data-display="Currency">USD</option>
                                    <option value="1">BDT</option>
                                    <option value="2">SNG</option>
                                    <option value="4">ERU</option>
                                </select><div class="nice-select" tabindex="0"><span class="current">Currency</span><ul class="list"><li data-value="USD" data-display="Currency" class="option selected">USD</li><li data-value="1" class="option">BDT</li><li data-value="2" class="option">SNG</li><li data-value="4" class="option">ERU</li></ul></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
            'items' => $menuItems,
        ]);
        if (Yii::$app->user->isGuest) {
            echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
        } else {
            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout text-decoration-none']
                )
                . Html::endForm();
        }
        NavBar::end();
        ?>
    </div>

</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
