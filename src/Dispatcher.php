<?php
namespace MartynBiz\Events;

/**
 *
 */
class Dispatcher {

    /**
     * @var array
     */
    protected $handlers = [];

    /**
     *
     */
    public function register($name, $handler)
    {
        if (!isset($this->handlers[$name]) or !is_array($this->handlers[$name])) {
            $this->handlers[$name] = [];
        }

        array_push($this->handlers[$name], $handler);
    }

    /**
     *
     */
    public function trigger($eventName, &...$arguments)
    {
        $handlers = @$this->handlers[$eventName];

        if (is_array($handlers)) {
            foreach ($handlers as $handler) {
                $handler(...$arguments);
            }
        }
    }
}
