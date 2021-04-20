<?php
/*
* File: custom_message_mask.php
* Category: Example
* Author: M.Goldenbaum
* Created: 14.03.19 18:47
* Updated: -
*
* Description:
*  -
*/

class CustomAttachmentMask extends \Ninhtqse\PHPIMAP\Support\Masks\AttachmentMask {

    /**
     * New custom method which can be called through a mask
     * @return string
     */
    public function token(){
        return implode('-', [$this->id, $this->getMessage()->getUid(), $this->name]);
    }

    /**
     * Custom attachment saving method
     * @return bool
     */
    public function custom_save() {
        $path = "foo".DIRECTORY_SEPARATOR."bar".DIRECTORY_SEPARATOR;
        $filename = $this->token();

        return file_put_contents($path.$filename, $this->getContent()) !== false;
    }

}

/** @var \Ninhtqse\PHPIMAP\Client $client */
$cm = new \Ninhtqse\PHPIMAP\ClientManager('path/to/config/imap.php');
$client = $cm->account('default');
$client->connect();
$client->setDefaultAttachmentMask(CustomAttachmentMask::class);

/** @var \Ninhtqse\PHPIMAP\Folder $folder */
$folder = $client->getFolder('INBOX');

/** @var \Ninhtqse\PHPIMAP\Message $message */
$message = $folder->query()->limit(1)->get()->first();

/** @var \Ninhtqse\PHPIMAP\Attachment $attachment */
$attachment = $message->getAttachments()->first();

/** @var CustomAttachmentMask $masked_attachment */
$masked_attachment = $attachment->mask();

echo 'Token for uid ['.$masked_attachment->getMessage()->getUid().']: '.$masked_attachment->token();

$masked_attachment->custom_save();