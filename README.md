

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> Note: Check the [composer.json](https://github.com/kartik-v/yii2-date-range/blob/master/composer.json) for this extension's requirements and dependencies.
Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

Either run

```
$ php composer.phar require vanterbit/yii2-date-range "dev-master"
```

or add

```
"vanterbit/yii2-date-range": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

### DateRangePicker

```php
use vanterbit\daterange\DateRangePicker;
echo DateRangePicker::widget([
    'model'=>$model,
    'attribute'=>'datetime_range',
    'convertFormat'=>true,
    'pluginOptions'=>[
        'timePicker'=>true,
        'timePickerIncrement'=>30,
        'locale'=>[
            'format'=>'Y-m-d h:i A'
        ]
    ]
]);
```
or using seperate min/max attributes on model

```php
use vanterbit\daterange\DateRangePicker;
echo DateRangePicker::widget([
    'model'=>$model,
    'attribute'=>'datetime_range',
    'convertFormat'=>true,
    'startAttribute'=>'datetime_min',
    'endAttribute'=>'datetime_max',
    'pluginOptions'=>[
        'timePicker'=>true,
        'timePickerIncrement'=>30,
        'locale'=>[
            'format'=>'Y-m-d h:i A'
        ]
    ]
]);
```

### DateRangeBehavior

```php
use vanterbit\daterange\DateRangeBehavior;

class UserSearch extends User
{
    public $createTimeRange;
    public $createTimeStart;
    public $createTimeEnd;

    public function behaviors()
    {
        return [
            [
                'class' => DateRangeBehavior::className(),
                'attribute' => 'createTimeRange',
                'dateStartAttribute' => 'createTimeStart',
                'dateEndAttribute' => 'createTimeEnd',
            ]
        ];
    }

    public function rules()
    {
        return [
            // ...
            [['createTimeRange'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
        ];
    }

    public function search($params)
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['>=', 'createdAt', $this->createTimeStart])
              ->andFilterWhere(['<', 'createdAt', $this->createTimeEnd]);

        return $dataProvider;
    }
}
```

## License

**yii2-date-range** is released under the BSD-3-Clause License. See the bundled `LICENSE.md` for details.
