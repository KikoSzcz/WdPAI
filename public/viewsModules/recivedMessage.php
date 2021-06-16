<?php
require_once __DIR__.'/../../src/models/readRecivedMessage.php';

$readInformation = new readRecivedMessage();
$readInformation->readInfromation();

$numberOfMessage = sizeof($readInformation->titles);
if($numberOfMessage===0)
{
echo '<p class="noMessages">You dont have any messages!</p>';
}
else
{
    echo '<div class="recivedMessageContainer"><div class="leftSideRecivedMessage">';
    for($i = $numberOfMessage-1; $i >= 0; $i--)
    {
        echo '<div class="recivedMessageSmall" id="r'.$i.'" onclick="displayMessageRecived('.$i.')">';
        echo '<p class="fromWho">'.$readInformation->fromWho[$i].'</p>';
        echo '<p class="title">'.$readInformation->titles[$i].'</p>';
        echo '<p class="toWho" style="display: none;">'.$readInformation->ToWho[$i].'</p>';
        echo '<p class="message" style="display: none;">'.$readInformation->message[$i].'</p>';
        echo '<p class="attachment" style="display: none;">'.$readInformation->attachments[$i].'</p>';
        echo '<input  style="display: none;" class="attachmentsName" value="'.$readInformation->attachmentsName[$i].'"/>';
        echo '</div>';

    }
    echo '</div><div class="rightSideRecivedMessage"></div><div style="clear: both"></div></div>';
}
