<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

$languages = [
  'en' => 'English',
  'ae' => 'العربية',
  'cn' => '中文',
  'ru' => 'русский',
  'de' => 'Deutsch',
  'fr' => 'Français'
];
$currentLanguage = Yii::$app->language;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
  <?php $this->beginBody() ?>

  <header id="header">
    <?php
    NavBar::begin([
      'brandLabel' => 'Car booking statistic',
      'brandUrl' => Yii::$app->homeUrl,
      'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top w-full']
    ]);
    echo Nav::widget([
      'options' => ['class' => 'navbar-nav'],
      'items' => [
        ['label' => 'Cars', 'url' => ['/car']],
        ['label' => 'Bookings', 'url' => ['/booking']],
        ['label' => 'Car models', 'url' => ['/car-model']],
        ['label' => 'Car brands', 'url' => ['/car-brand']],
      ]
    ]);
    ?>
    <div class="language-switcher">
      <?php foreach ($languages as $code => $label): ?>
        <a href="<?= Url::current(['language' => $code]) ?>"
          class="<?= $currentLanguage === $code ? 'active' : '' ?>">
          <?= $label ?>
        </a>
      <?php endforeach; ?>
    </div>
    <? NavBar::end(); ?>
  </header>

  <main id="main" class="flex-shrink-0" role="main">
    <div class="container">
      <?php if (!empty($this->params['breadcrumbs'])): ?>
        <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
      <?php endif ?>
      <?= Alert::widget() ?>
      <?= $content ?>
    </div>
  </main>

  <footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
      <div class="row text-muted">
        <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
        <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
      </div>
    </div>
  </footer>

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>