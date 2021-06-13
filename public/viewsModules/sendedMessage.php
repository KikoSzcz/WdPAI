<?php
require_once __DIR__.'/../../src/models/readSendedMessage.php';

$readSendedInformation = new readSendedMessage();
$readSendedInformation->readSendedInfromation();

$numberOfMessage = sizeof($readSendedInformation->titles);

if($numberOfMessage===0)
{
    echo '<p class="noMessages">You dont have any messages!</p>';
}
else
{
    echo '<div class="sendedMessageContainer"><div class="leftSideSendedMessage">';
    for($i = $numberOfMessage-1; $i > 0; $i--)
    {
        echo '<div class="sendedMessageSmall" id="r'.$i.'" onclick="displayMessageSended('.$i.')">';
        echo '<p class="fromWho">'.$readSendedInformation->fromWho[$i].'</p>';
        echo '<p class="title">'.$readSendedInformation->titles[$i].'</p>';
        echo '<p class="toWho" style="display: none;">'.$readSendedInformation->ToWho[$i].'</p>';
        echo '<p class="message" style="display: none;">'.$readSendedInformation->message[$i].'</p>';
        echo '<p class="attachment" style="display: none;">'.$readSendedInformation->attachments[$i].'</p>';
        echo '<input  style="display: none;" class="attachmentsName" value="'.$readSendedInformation->attachmentsName[$i].'"/>';
        echo '</div>';

    }
    echo '</div><div class="rightSideSendedMessage"></div></div>';
}