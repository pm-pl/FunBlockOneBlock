<?php

namespace cosmicnebula200\FunBlockOneBlock\commands\subcommands;

use CortexPE\Commando\BaseSubCommand;
use cosmicnebula200\FunBlockOneBlock\FunBlockOneBlock;
use pocketmine\player\Player as P;
use pocketmine\command\CommandSender;

class ChatSubCommand extends BaseSubCommand
{

    protected function prepare(): void
    {
        $this->setPermission("funblockoneblock.chat");
    }

    public function onRun(CommandSender $sender, string $aliasUsed, array $args): void
    {
        if (!$sender instanceof P)
            return;
        if (!in_array($sender->getName(), FunBlockOneBlock::getInstance()->getChat()))
            FunBlockOneBlock::getInstance()->addPlayerToChat($sender);
        else
            FunBlockOneBlock::getInstance()->removePlayerFromChat($sender);
        $sender->sendMessage(FunBlockOneBlock::getInstance()->getMessages()->getMessage("toggle-chat"));
    }

}