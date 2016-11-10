<?php

namespace app\components;

use yii\i18n\MissingTranslationEvent;
use app\models\SourceMessage;

class TranslationEventHandler
{
    public static function handleMissingTranslation(MissingTranslationEvent $event) {
        //$event->translatedMessage = "@MISSING: {$event->category}.{$event->message} FOR LANGUAGE {$event->language} @";
        // search message in DB
        $search = SourceMessage::find()
            ->where('category = :category and message = :message', [
                ':category' => $event->category,
                ':message' => $event->message
            ])
            ->one();
        if(!$search){
            // save new message into DB
            $sourceMessage = new SourceMessage;
            $sourceMessage->setAttributes([
                'category' => $event->category,
                'message' => $event->message
            ], false);
            $sourceMessage->save(false);
        }
    }
}