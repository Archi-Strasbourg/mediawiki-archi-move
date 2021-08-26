<?php

namespace ArchiMove;

use MovePage;
use Title;

class ArchiMove
{
    public static function onTitleMove($oldTitle, $newTitle)
    {
        if ($oldTitle->getNamespace() == NS_ADDRESS && $newTitle->getNamespace() == NS_ADDRESS) {
            global $wgUser;

            $movePage = new MovePage(
                Title::newFromText($oldTitle->getText(), NS_ADDRESS_NEWS),
                Title::newFromText($newTitle->getText(), NS_ADDRESS_NEWS)
            );

            $movePage->move($wgUser, 'Page d\'actualités renommée automatiquement suite à un renommage de la page principale');
        }
    }
}
