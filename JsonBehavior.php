<?php

namespace jumper423\behaviors;

use yii\helpers\Json;

/**
 * Кодирование и декодирование значений в/из JSON формата
 *
 * [
 *    'class' => JsonBehavior::className(),
 *    'attributes' => [
 *       self::EVENT_AFTER_VALIDATE => ['setting',],
 *    ],
 * ],
 * [
 *    'class' => JsonBehavior::className(),
 *    'attributes' => [
 *       self::EVENT_AFTER_FIND => ['setting',],
 *    ],
 *    'type' => JsonBehavior::DECODE,
 * ],
 *
 * Class JsonBehavior
 * @package jumper423\behaviors
 */
class JsonBehavior extends AttributeBehavior
{
    const DECODE = 'decode';
    const ENCODE = 'encode';

    public $type = self::ENCODE;

    /** @inheritdoc */
    protected function computation($value)
    {
        switch ($this->type) {
            case self::ENCODE:
                if (!is_string($value) && !is_null($value)) {
                    return Json::encode($value);
                }
                break;
            case self::DECODE:
                if (!is_array($value) && !is_null($value)) {
                    return Json::decode($value);
                }
                break;
        }
        return $value;
    }
}
