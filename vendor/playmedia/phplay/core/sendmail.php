<?php
/**
 * PHPlay Framework.
 *
 * Simple SMTP mailer class
 *
 * TODO : send() args validation
 * TODO : Charset is currently fixed to UTF-8
 * TODO : Html unsupported
 * TODO : File attachement not supported
 * TODO : Use EHLO for detect available AUTH methods (currently support only LOGIN which base64 encode login and password)
 *
 * Source : http://www.codewalkers.com/c/a/Email-Code/Smtp-Auth-Email-Script/
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_sendmail
{
    private $config,
        $current = null,
        $timeout = 10,
        $last_error = '';

    /**
     * Constructor.
     *
     * @param ppl_var $config application configuration
     */
    public function __construct(ppl_var $config)
    {
        $this->config = $config;
        if ($config->sendmail !== null) {
            // read default sendmail configuration

            foreach ($config->sendmail as $conf) {
                $this->current = $conf;
                break;
            }
        }
    }

    /**
     * Set current mail server configuration.
     *
     * @param string $identifier mail server configuration unique identifier (sendmail.conf)
     */
    public function set($identifier)
    {
        if (($this->config->sendmail !== null) && isset($this->config->sendmail->$identifier)) {
            $this->current = $this->config->sendmail->$identifier;

            return $this;
        }
        throw new SendmailException("Sendmail identifier '{$identifier}' does not exists");
    }

    /**
     * Set SMTP connection timeout.
     *
     * @param int $timeout smtp connection timeout
     */
    public function set_timeout($timeout)
    {
        if (!is_int($timeout) || ($timeout < 0)) {
            throw new SendmailException('Sendmail connection timeout must be a positive integer');
        }
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Sends an email.
     *
     * @param string $from    from address
     * @param string $to      to address
     * @param string $subject subject
     * @param string $message message
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    public function send($from, $to, $subject, $message)
    {
        if ($this->current === null) {
            $this->last_error = 'No default smtp configuration (sendmail.conf)';

            return false;
        }

        // TODO : validations

        return $this->smtp_send($from, $to, $subject, $message);
    }

    /**
     * Get last error message (empty string if no error).
     *
     * @return string last error message
     */
    public function get_last_error()
    {
        return $this->last_error;
    }

    /**
     * Sends an email using current smtp configuration.
     *
     * @param string $from    from address
     * @param string $to      to address
     * @param string $subject subject
     * @param string $message message
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    private function smtp_send($from, $to, $subject, $message)
    {
        $this->last_error = '';

        // Connect to smtp server
        $conn = $this->smtp_connect();
        if (!$conn) {
            return false;
        }

        // Request authentication login
        if ($this->is_smtp_error_response($this->smtp_command($conn, 'AUTH LOGIN'))) {
            $this->smtp_disconnect($conn);

            return false;
        }

        // Send username
        if ($this->is_smtp_error_response($this->smtp_command($conn, base64_encode($this->current->username)))) {
            $this->smtp_disconnect($conn);

            return false;
        }

        // Send password
        if ($this->is_smtp_error_response($this->smtp_command($conn, base64_encode($this->current->password)))) {
            $this->smtp_disconnect($conn);

            return false;
        }

        // Say Hello to SMTP
        if ($this->is_smtp_error_response($this->smtp_command($conn, 'HELO localhost'))) {
            $this->smtp_disconnect($conn);

            return false;
        }

        // Mail From
        if ($this->is_smtp_error_response($this->smtp_command($conn, "MAIL FROM: {$from}"))) {
            $this->smtp_disconnect($conn);

            return false;
        }

        // Mail To
        if ($this->is_smtp_error_response($this->smtp_command($conn, "RCPT TO: {$to}"))) {
            $this->smtp_disconnect($conn);

            return false;
        }

        // Initiates transfer of the mail data
        if ($this->is_smtp_error_response($this->smtp_command($conn, 'DATA'))) {
            $this->smtp_disconnect($conn);

            return false;
        }

        // Transfert mail data
        $data = "Subject: {$subject}\r\n";
        $data .= "MIME-Version: 1.0\r\n";
        $data .= "Content-type: text/plain; charset=UTF-8\r\n";
        $data .= "To: {$to}\r\n";
        $data .= "From: {$from}\r\n";
        $data .= "\r\n\r\n";
        $data .= "{$message}\r\n.";
        if ($this->is_smtp_error_response($this->smtp_command($conn, $data))) {
            $this->smtp_disconnect($conn);

            return false;
        }

        // Quit and disconnect
        return $this->smtp_disconnect($conn);
    }

    /**
     * Connect to stmp server.
     *
     * @return mixed socket handle or FALSE on failure
     */
    private function smtp_connect()
    {
        // Open Socket
        $conn = fsockopen($this->current->host, $this->current->port, $errno, $errstr, $this->timeout); // May trigger E_WARNING
        if (!$conn) {
            $this->last_error = "{$errno} {$errstr}";

            return false;
        }
        // Server may be Temporary unavailable
        if ($this->is_smtp_error_response(fgets($conn, 515))) {
            $this->smtp_disconnect($conn);

            return false;
        }

        return $conn;
    }

    /**
     * Quit and disconnect from smtp server.
     *
     * @param resource $conn socket connection handle
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    private function smtp_disconnect($conn)
    {
        if (!$conn) {
            $this->last_error = 'Invalid smtp connection handle (smtp_disconnect)';

            return false;
        }
        // Send QUIT to stmp server
        $this->is_smtp_error_response($this->smtp_command($conn, 'QUIT'));

        return fclose($conn);
    }

    /**
     * Send command to smtp server.
     *
     * @param resource $conn socket connection handle
     * @param string   $cmd  smtp command
     *
     * @return string smtp server response
     */
    private function smtp_command($conn, $cmd)
    {
        if (!$conn) {
            $this->last_error = '500 Invalid smtp connection handle (smtp_command)';

            return $this->last_error;
        }
        fwrite($conn, "{$cmd}\r\n");

        return fgets($conn, 515);
    }

    /**
     * Check smtp response message.
     *
     * @see Simple Mail Transfer Protocol (RFC 2821) : http://www.ietf.org/rfc/rfc2821.txt
     *
     * @param string $response smtp response message
     *
     * @return bool TRUE if response is error, otherwise FALSE
     */
    private function is_smtp_error_response($response)
    {
        if ((!is_string($response)) || ($response === '')) {
            $this->last_error = 'Invalid response (is_smtp_error_response)';

            return true;
        }
        if (isset($response[0]) && is_numeric($response[0]) && ((int) $response[0] > 3)) {
            $this->last_error = $response;

            return true;
        }

        return false;
    }

    private function __clone()
    {
    }
}
final class SendmailException extends Exception
{
}
