<?php

/**
 * @package yii2-date-range
 * @version 1.7.3
 */

namespace vanterbit\daterange;

use yii\web\View;
use kartik\base\AssetBundle;

/**
 * Language Asset bundle for \vanterbit\daterange\DateRangePicker.
 *
 * @author Aleksandr Protchenko <protchenko.88@gmail.com>
 * @since 1.0
 */
class LanguageAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $jsOptions = ['position' => View::POS_HEAD];
    /**
     * @inheritdoc
     */
    public $depends = ['\vanterbit\daterange\MomentAsset'];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        parent::init();
    }
}
