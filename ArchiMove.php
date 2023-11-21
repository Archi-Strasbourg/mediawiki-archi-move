<?php

namespace ArchiMove;

use MediaWiki\MediaWikiServices;
use RequestContext;
use Title;

/**
 * Hook qui déplace la page d'actualité
 * en même temps que l'adresse
 *
 * @noinspection PhpUnused
 */
class ArchiMove
{

    /**
     * @param Title $oldTitle
     * @param Title $newTitle
     * @noinspection PhpUnused
     */
    public static function onTitleMove(Title $oldTitle, Title $newTitle)
    {
        if ($oldTitle->getNamespace() == NS_ADDRESS && $newTitle->getNamespace() == NS_ADDRESS) {
            $movePage = MediaWikiServices::getInstance()->getMovePageFactory()->newMovePage(
                Title::newFromText($oldTitle->getText(), NS_ADDRESS_NEWS),
                Title::newFromText($newTitle->getText(), NS_ADDRESS_NEWS)
            );

            $movePage->move(
                RequestContext::getMain()->getUser(),
                'Page d\'actualités renommée automatiquement suite à un renommage de la page principale'
            );
        }
    }
}
