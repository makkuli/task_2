<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);

$asset = \Bitrix\Main\Page\Asset::getInstance();

?>

    <html>
    <head>
        <? $APPLICATION->ShowHead(); ?>
        <?
        $asset->addString('<link rel="shortcut icon" href="' . SITE_TEMPLATE_PATH . '/images/favicon.604825ed.ico" type="image/x-icon">');
        ?>
        <title><? $APPLICATION->ShowTitle() ?></title>
    </head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">

<? $APPLICATION->ShowPanel() ?>
<? if ($USER->IsAdmin()): ?>
<? endif ?>