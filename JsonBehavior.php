<?php

namespace jumper423\behaviors;

use yii\behaviors\AttributeBehavior;
use yii\helpers\Json;

class JsonBehavior extends AttributeBehavior
{
    const DECODE = 'decode';
    const ENCODE = 'encode';

    public $type = self::ENCODE;

    /**
     * @inheritdoc
     */
    public function evaluateAttributes($event)
    {
        if (!empty($this->attributes[$event->name])) {
            $attributes = (array)$this->attributes[$event->name];
            switch ($this->type) {
                case self::ENCODE:
                    foreach ($attributes as $attribute) {
                        if (is_string($attribute)) {
                            if (!is_string($this->owner->$attribute) && !is_null($this->owner->$attribute)) {
                                $this->owner->$attribute = Json::encode($this->owner->$attribute);
                            }
                        }
                    }
                    break;
                case self::DECODE:
                    foreach ($attributes as $attribute) {
                        if (is_array($attribute)) {
                            if (!is_array($this->owner->$attribute) && !is_null($this->owner->$attribute)) {
                                $this->owner->$attribute = Json::decode($this->owner->$attribute);
                            }
                        }
                    }
                    break;
            }
        }
    }
}
