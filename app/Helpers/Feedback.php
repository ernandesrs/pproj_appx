<?php

namespace App\Helpers;

class Feedback
{
    /**
     * App layear name. Example: 'admin', 'customer'
     * @var string
     */
    private string $to;

    /**
     * Type: default, success, info, danger, error, warning
     * @var string
     */
    private string $type;

    /**
     * Title
     * @var
     */
    private ?string $title;

    /**
     * Message
     * @var string
     */
    private string $message;

    /**
     * Fixed
     * @var bool
     */
    private bool $fixed = false;

    /**
     * __construct
     * @param string $to app layear name. Example: 'admin', 'customer'
     */
    public function __construct(
        string $to
    ) {
        $this->to = $to;
    }

    /**
     * To
     * @param string $to app layear name. Example: 'admin', 'customer'
     * @return \App\Helpers\Feedback
     */
    public static function to(string $to): Feedback
    {
        $feedback = new Feedback($to);
        return $feedback;
    }

    /**
     * Default
     * @param string $message
     * @param ?string $title
     * @return \App\Helpers\Feedback
     */
    public function default(string $message, ?string $title = null): Feedback
    {
        return $this->add($message, $title, 'default');
    }

    /**
     * Success
     * @param string $message
     * @param ?string $title
     * @return Feedback
     */
    public function success(string $message, ?string $title = null): Feedback
    {
        return $this->add($message, $title, 'success');
    }

    /**
     * Info
     * @param string $message
     * @param ?string $title
     * @return Feedback
     */
    public function info(string $message, ?string $title = null): Feedback
    {
        return $this->add($message, $title, 'info');
    }

    /**
     * Fixed
     * @return Feedback
     */
    public function fixed(): Feedback
    {
        $this->fixed = true;
        return $this;
    }

    /**
     * From Session
     * @param string $to app layear name. Example: 'admin', 'customer'
     * @return \App\Helpers\Feedback
     */
    public static function fromSession(string $to): Feedback
    {
        return \Session::get($to . '_feedback');
    }

    /**
     * Feedback to Session
     * @return void
     */
    public function toSession(): void
    {
        \Session::flash($this->to . '_feedback', $this);
    }

    /**
     * Feedback To Array
     * @return array
     */
    public function toArray(): array
    {
        return [
            'to' => $this->to,
            'fixed' => $this->fixed,
            'type' => $this->type,
            'title' => $this->title,
            'message' => $this->message,
        ];
    }

    /**
     * Add
     * @param string $message
     * @param ?string $title
     * @param string $type
     * @return \App\Helpers\Feedback
     */
    private function add(string $message, ?string $title = null, string $type = ''): Feedback
    {
        $this->message = $message;
        $this->title = $title;
        $this->type = $type;
        return $this;
    }
}
