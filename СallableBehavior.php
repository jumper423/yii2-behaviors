<?php

namespace jumper423\behaviors;

/**
 * Преобразовать функцию в значение
 *
 * [
 *    'class' => СallableBehavior::className(),
 *    'attributes' => [
 *       self::EVENT_INIT => ['api_key',],
 *    ],
 * ],
 *
 * Class СallableBehavior
 * @package jumper423\behaviors
 */
class СallableBehavior extends AttributeBehavior
{
    /** @inheritdoc */
    protected function computation($value){
        return $value instanceof \Closure ? call_user_func($value) : $value;
    }
}
