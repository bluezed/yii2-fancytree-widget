<?php
/**
 * @link      https://github.com/bluezed/yii2-fancytree-widget
 * @copyright Copyright (c) 2015 Thomas Geppert
 * @copyright Copyright (c) 2014 Wanderson Bragança
 * @license   https://github.com/bluezed/yii2-fancytree-widget/blob/master/LICENSE
 */

namespace bluezed\fancytree;

use yii\helpers\Html;
use yii\helpers\Json;

/**
 * The yii2-fancytree-widget is a Yii 2 wrapper for the fancytree.js
 * See more: https://github.com/mar10/fancytree
 *
 * @author Thomas Geppert <bluezed.apps@gmail.com>
 */
class FancytreeWidget extends \yii\base\Widget
{
    /**
     * @var array
     */
    public $options = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerAssets();
    }

    /**
     * Registers the needed assets
     */
     public function registerAssets()
    {
        $view = $this->getView();
        $bundles = $view->assetManager->bundles;
        if (!isset($bundles['bluezed\\fancytree\\FancytreeAsset'])) {
            FancytreeAsset::register($view);
        }

        $tagOptions = [];
        if (isset($this->options['id'])) {
            $tagOptions['id'] = $this->options['id'];
            unset($this->options['id']);
        } else {
            $tagOptions['id'] = 'fancytree_' . $this->id;
        }

        if (isset($this->options['htmlOptions'])) {
            $tagOptions = $tagOptions + $this->options['htmlOptions'];
            unset($this->options['htmlOptions']);
        }

        echo Html::tag('div', '', $tagOptions);

        $options = Json::encode($this->options);
        $view->registerJs('$("#' . $tagOptions['id'] . '").fancytree( ' .$options .')');
    }
}
