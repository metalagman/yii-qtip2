<?php
/**
 * Created by PhpStorm.
 * User: lagman
 * Date: 18.11.13
 * Time: 13:16
 */

class qTip2 extends CApplicationComponent
{
    /** @var bool Force using files from cdn instead of local ones */
    public $useCDN = false;
    /** @var bool Use minified version of scripts */
    public $useMinified = true;
    /** @var string Version to use */
    public $version = "2.1.1";
    /** @var array Plugin options */
    public $options = [];

    public function init()
    {
        if (!$this->isInitialized) {
            /** @var CClientScript $cs */
            $cs = Yii::app()->clientScript;
            /** @var CAssetManager $am */
            $am = Yii::app()->assetManager;

            $cs->registerCoreScript('jquery');

            $jsFile = $this->useMinified ? 'jquery.qtip.min.js' : 'jquery.qtip.js';
            $cssFile = $this->useMinified ? 'jquery.qtip.min.css' : 'jquery.qtip.css';

            if ($this->useCDN) {
                $baseUrl = '//cdnjs.cloudflare.com/ajax/libs/qtip2/'.$this->version;
            } else {
                $baseUrl = $am->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.$this->version);
            }

            $cs->registerScriptFile($baseUrl.'/'.$jsFile);
            $cs->registerCssFile($baseUrl.'/'.$cssFile);
        }
    }

    /**
     * Applies qtip plugin to selector
     * @param $selector
     * @param array $options
     */
    public static function apply($selector, $options = []) {
        $c = Yii::app()->getComponent('qTip2') ?: new self;
        $c->init();

        $options = CMap::mergeArray($c->options, $options);

        Yii::app()->clientScript->registerScript('qTip2'.$selector, '$("'.$selector.'").qtip('.CJavaScript::encode($options).');');
    }

}