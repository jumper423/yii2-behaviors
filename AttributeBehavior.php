<?php

namespace jumper423\behaviors;

use yii\behaviors\AttributeBehavior as AttributeBehaviorBase;

/**
 * Class AttributeBehavior
 * @package jumper423\behaviors
 */
class AttributeBehavior extends AttributeBehaviorBase
{
    /** @inheritdoc */
    public function evaluateAttributes($event)
    {
        if (!empty($this->attributes[$event->name])) {
            $attributes = (array) $this->attributes[$event->name];
            foreach ($attributes as $attribute) {
                if (is_string($attribute)) {
                    $this->owner->$attribute = $this->computation($this->owner->$attribute);
                }
            }
        }
    }

    /**
     * Вычисление значения
     * @param $value
     * @return mixed
     */
    protected function computation($value){
        return $value;
    }
}