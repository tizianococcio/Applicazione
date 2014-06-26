<?php

namespace front;

use \PDO;

class Applicazione
{

	/**
	 * Handle connessione DB PDO
	 */
	protected $db;

    /**
     * Configurazione SMTP per PHPMailer
     */

    /**
     * Nome del mittente
     * @var string
     */
    protected $emailMittente = 'Name of sender';

    /**
     * Indirizzo mail del mittente
     * @var string
     */    
    protected $emailIndirizzo = 'email@address.com';
    
    /**
     * Host del server SMTP
     * @var string
     */    
    protected $smtpHost = 'smtp.host.com';
    
    /**
     * Porta del server SMTP
     * @var string
     */
    protected $smtpPort = 25;
    
    /**
     * Codifica del server SMTP
     * @var string
     */    
    protected $smtpEncryption = 'tls';
    
    /**
     * Nome utente dell'account SMTP
     * @var string
     */    
    protected $smtpUsername = 'user@name.com';
    
    /**
     * Password dell'account SMTP
     * @var string
     */    
    protected $smtpPassword = '*********';

    /**
     * Parametri email per form di informazioni
     */
    protected $formEmailRecipientName = 'Recipient name';
    protected $formEmailRecipientAddress = 'recipient.email@address.com';

	protected function __construct()
	{
        $db = new front\db\Database(new \DatabaseConfig());
		$this->db = $db->getConnessione();
	}

	/**
	 * Fornisce istanza singleton della classe
	 */
	public static function Istanza()
	{
		static $inst = null;
		if ($inst === null)
		{
			$inst = new Applicazione();
		}
		return $inst;
	}

    // Istanza singleton di PHPMailer
    public static function getPHPMailer()
    {
        static $PHPMailerInstance = null;
        if ($PHPMailerInstance === null)
        {
            $PHPMailerInstance = new \PHPMailer();
        }
        return $PHPMailerInstance;
    }
}
