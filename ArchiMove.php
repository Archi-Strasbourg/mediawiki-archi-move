<?php

namespace ArchiMove;

class ArchiMove
{
    public static function onTitleMove($oldTitle, $newTitle)
    {
        if ($oldTitle->getNamespace() == NS_ADDRESS && $newTitle->getNamespace() == NS_ADDRESS) {
            $oldNewsTitle = \Title::newFromText($oldTitle->getText(), NS_ADDRESS_NEWS);
            $newNewsTitle = \Title::newFromText($newTitle->getText(), NS_ADDRESS_NEWS);

            $oldNewsTitle->moveTo(
                $newNewsTitle,
                true,
                'Page d\'actualités renommée automatiquement suite à un renommage de la page principale'
            );
        }
    }
}
