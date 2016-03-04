<?php

namespace jumper423\behaviors;

use yii\behaviors\AttributeBehavior;
use yii\helpers\Json;

class JsonBehavior extends AttributeBehavior
{
    /**
     * @inheritdoc
     */
    public function evaluateAttributes($event)
    {
        if (!empty($this->attributes[$event->name])) {
            $attributes = (array) $this->attributes[$event->name];
            foreach ($attributes as $attribute) {
                if (is_string($attribute)) {
                    if (!is_string($this->owner->$attribute) && !is_null($this->owner->$attribute)) {
                        $this->owner->$attribute = Json::encode($this->owner->$attribute);
                    }
                }
            }
        }
    }
}
