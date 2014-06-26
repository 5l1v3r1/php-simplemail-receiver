<?php
/**
 * Mail.php
 *
 * PHP version 5
 *
 * @category Mail
 * @package  EmailConnector\model\mail
 * @author   jlcardosa <joseluis.cardosamanzano@maviance.com>
 * @license  maviance GmbH 2014
 * @version  SVN: $Id$
 * @link     Mail
 */
namespace SimpleMailReceiver\Mail;

use SimpleMailReceiver\Commons\Collection;
/**
 * Class to handle the content of a eMail
 *
 * @category Mail
 * @package  EmailConnector\model\mail
 * @author   jlcardosa <joseluis.cardosamanzano@maviance.com>
 * @license  maviance GmbH 2014
 * @version  Release: 1.01
 * @link     Mail
 *
 */
class Mail
{
    /**
     * The header of the mail
     *
     * @var Collection
     */
    private $mailHeader;

    /**
     * The body of the mail
     *
     * @var string
     */
    private $body;

    /**
     * The files that has been attached to this mail
     *
     * @var Collection
     */
    private $attachments;

    /**
     * Get the mail header
     *
     * @return unknown
     */
    public function getMailHeader()
    {
        return $this->mailHeader;
    }

    /**
     * Set the mail header
     *
     * @param Collection $mailHeader The header
     *
     * @return \EmailConnector\model\mail\Mail
     */
    public function setMailHeader($mailHeader)
    {
        $this->mailHeader = $mailHeader;
        return $this;
    }

    /**
     * Get the body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the body
     *
     * @param string $body The body
     *
     * @return
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Get the attachments
     *
     * @return the array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * Set the attachments
     *
     * @param Collection $attachments The attachments
     *
     * @return
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }

    /**
     * Search in the whole mail if there is a pattern that match
     *
     * @param string $pattern The pattern to search
     *
     * @return boolean
     */
    public function search($pattern)
    {
        //TODO
        /*
        if (is_int(strpos($this->body, $pattern)) || $this->mailHeader->search($pattern))
        {
            return true;
        }
        foreach ($this->attachments as $attach)
        {
            if ($attach->searchFilename($pattern) || $attach->searchContent($pattern))
            {
                return true;
            }
        }
        return false;*/
    }

    /**
     * Convert to array the object
     *
     * @return multitype:\EmailConnector\model\mail\MailHeader string multitype:
     */
    public function toArray()
    {
        return array(
            "header"     => $this->mailHeader,
            "body"       => $this->body,
            "attachment" => $this->attachments
        );
    }

    /**
     * Conver to a string the object
     *
     * @return string
     */
    public function __toString()
    {
        $string = "";
        $string .= $this->mailHeader;
        $string .= "\n--------------------------------------------------------------------------------\n";
        $string .= $this->body;
        $string .= "\n--------------------------------------------------------------------------------\n";
        $string .= "Attached files: \n";
        foreach ($this->attachments as $part)
        {
            $string .= "\t * " . $part . "\n";
        }

        return $string;
    }
}
