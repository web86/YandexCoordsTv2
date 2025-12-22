<?php
/** @var $modx modX */
if (!$modx = $object->xpdo OR !$object->xpdo instanceof modX) {
    return true;
}

switch ($options[xPDOTransport::PACKAGE_ACTION]) {

    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        $settings = [
            'yandex_coords_tv_api_key2' => [
                'area'  => 'api',
                'xtype' => 'textfield',
                'value' => !empty($options['apikey'])
                    ? trim($options['apikey'])
                    : '',
            ],
            'yandex_coords_tv_api_suggest_key' => [
                'area'  => 'api',
                'xtype' => 'textfield',
                'value' => !empty($options['suggestkey'])
                    ? trim($options['suggestkey'])
                    : '',
            ],
        ];

        foreach ($settings as $key => $data) {

            $setting = $modx->getObject(
                'modSystemSetting',
                ['key' => $key]
            );

            if (!$setting) {
                $setting = $modx->newObject('modSystemSetting');
            }

            $setting->fromArray([
                'key'       => $key,
                'namespace' => 'myyandexcoordstv',
                'area'      => $data['area'],
                'xtype'     => $data['xtype'],
                'value'     => $data['value'],
            ], '', true, true);

            $setting->save();
        }

        break;

    case xPDOTransport::ACTION_UNINSTALL:
        // при необходимости можно удалить настройки
        break;
}

return true;
