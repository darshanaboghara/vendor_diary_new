<?php defined('BASEPATH') OR exit('No direct script access allowed');

// $config = array(
//     'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
//     'smtp_host' => 'smtp.example.com', 
//     'smtp_port' => 465,
//     'smtp_user' => 'tempnimesh007@gmail.com',
//     'smtp_pass' => 'god404gmail',
//     'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
//     'mailtype' => 'text', //plaintext 'text' mails or 'html'
//     'smtp_timeout' => '4', //in seconds
//     'charset' => 'iso-8859-1',
//     'wordwrap' => TRUE
// );
$config = array(
                'protocol' => 'SMTP',
                'useragent' => 'Vendor Dairy',
                'mailpath'  => "/usr/sbin/sendmail",
                'smtp_host' => 'sg2plzcpnl462840.prod.sin2.secureserver.net',
                //'smtp_host' => 'smtp.hostinger.com',
                'smtp_port' => 465,
                'smtp_user' =>  MAIL_ID,
                'smtp_pass' => MAIL_PASSWORD,
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1',
                'wordwrap'   => TRUE,
                'newline' => "\r\n",
  		        'crlf' => "\r\n",
            );