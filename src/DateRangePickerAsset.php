<?php

/**
 * @package yii2-date-range
 * @version 1.7.3
 */

namespace vanterbit\daterange;

use vanterbit\base\AssetBundle;

/**
 * DateRangePicker bundle for \vanterbit\daterange\DateRangePicker.
 *
 * @author Aleksandr Protchenko <protchenko.88@gmail.com>
 * @since 1.0
 */
class DateRangePickerAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'vanterbit\daterange\MomentAsset',
        'yii\web\JqueryAsset'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/daterangepicker', 'css/daterangepicker-kv']);
        $this->setupAssets('js', ['js/daterangepicker']);
        parent::init();
    }
}
