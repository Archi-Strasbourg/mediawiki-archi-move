<?php

namespace ArchiMove;

use MovePage;
use Title;

class ArchiMove
{

    /**
     * @param Title $oldTitle
     * @param Title $newTitle
     */
    public static function onTitleMove(Title $oldTitle, Title $newTitle)
    {
        global $wgUser;

        if ($oldTitle->getNamespace() == NS_ADDRESS && $newTitle->getNamespace() == NS_ADDRESS) {
            $movePage = new MovePage(
                Title::newFromText($oldTitle->getText(), NS_ADDRESS_NEWS),
                Title::newFromText($newTitle->getText(), NS_ADDRESS_NEWS)
            );

            $movePage->move($wgUser, 'Page d\'actualités renommée automatiquement suite à un renommage de la page principale');
        }
    }
}
