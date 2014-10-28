<?php

use Nette\Mail\Message;

/**
* \Mail
*/
class Mail extends Message {
  public $config;

  // [String] e-mail
  protected $from;
  // [Array] e-mail list
  protected $to;

  protected $title;
  protected $body;

  function __construct($to)
  {
    $this->config = require BASE_PATH.'/config/mail.php';

    $this->setFrom($this->config['username']);

    if ( is_array($to) ) {
      foreach ($to as $email) {
        $this->addTo($email);
      }
    } else {
      $this->addTo($to);
    }
  }

  public function from($from=null)
  {
    if ( !$from ) {
      throw new InvalidArgumentException("邮件发送地址不能为空！");
    }
    $this->setFrom($from);
    return $this;
  }

  public static function to($to=null)
  {
    if ( !$to ) {
      throw new InvalidArgumentException("Mail receiving address can not be empty!");
    }
    return new Mail($to);
  }

  public function title($title=null)
  {
    if ( !$title ) {
      throw new InvalidArgumentException("Message headers can not be empty!");
    }
    $this->setSubject($title);
    return $this;
  }

  public function content($content=null)
  {
    if ( !$content ) {
      throw new InvalidArgumentException("Mail content can not be empty!");
    }
    $this->setHTMLBody($content);
    return $this;
  }

  // send mail
  public function send()
  {
    $mailer = new Nette\Mail\SmtpMailer($this->config);
    $mailer->send($this);
  }
}