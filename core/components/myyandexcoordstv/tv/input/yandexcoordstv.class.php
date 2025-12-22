<?php

if(!class_exists('YandexCoordsTvInputRender2')) {
    class YandexCoordsTvInputRender2 extends modTemplateVarInputRender {
        public function getTemplate() {
            return $this->modx->getOption('core_path').'components/myyandexcoordstv/tv/tpl/myyandexcoordstv.tpl';
        }
        public function process($value,array $params = array()) {
           
        }
    }
}
return 'YandexCoordsTvInputRender2';
