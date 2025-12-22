<?php
// $corePath = $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/myyandexcoordstv/';
// $assetsUrl = $modx->getOption('assets_url', null, MODX_CORE_PATH).'components/myyandexcoordstv/';
$corePath  = $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/myyandexcoordstv/';
$assetsUrl = $modx->getOption('assets_url', null, MODX_ASSETS_URL) . 'components/myyandexcoordstv/';

$yandexCoordsTvApiKey = $modx->getOption('yandex_coords_tv_api_key2');
$yandexCoordsTvApiSuggestKey = $modx->getOption('yandex_coords_tv_api_suggest_key');

switch ($modx->event->name) {
    case 'OnTVInputRenderList':
        $modx->event->output($corePath . 'tv/input/');
        break;
    case 'OnTVOutputRenderList':
        $modx->event->output($corePath . 'tv/output/');
        break;
    case 'OnTVInputPropertiesList':
        $modx->event->output($corePath . 'tv/inputoptions/');
        break;
    case 'OnTVOutputRenderPropertiesList':
        $modx->event->output($corePath . 'tv/properties/');
        break;
    case 'OnManagerPageBeforeRender':
        break;
    case 'OnDocFormRender':
        $modx->regClientCSS($assetsUrl . 'css/mgr/default.css');
    
        $ymapsUrl = '//api-maps.yandex.ru/2.1/?lang=ru_RU';
        if (!empty($yandexCoordsTvApiKey)) {
            $ymapsUrl .= '&apikey=' . urlencode($yandexCoordsTvApiKey);
            if (!empty($yandexCoordsTvApiSuggestKey)) {
                $ymapsUrl .= '&suggest_apikey=' . urlencode($yandexCoordsTvApiSuggestKey);
            }
        }
    
        // важно: именно URL, без document.write
        $modx->regClientScript($ymapsUrl, true);
        break;

}
