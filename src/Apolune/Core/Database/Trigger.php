<?php

namespace Apolune\Core\Database;

use Closure;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Query\Grammars\Grammar;

class Trigger
{
    /**
     * Holds the DatabaseManager implementation.
     *
     * @var \Illuminate\Database\DatabaseManager
     */
    protected $query;

    /**
     * Holds the event type.
     *
     * @var array
     */
    protected $event;

    /**
     * Holds the table.
     *
     * @var string
     */
    protected $table;

    /**
     * Create a new trigger instance.
     *
     * @param  \Illuminate\Database\DatabaseManager  $query
     */
    public function __construct(DatabaseManager $query)
    {
        $this->query = $query;
    }

    /**
     * Set the event type to an after event.
     *
     * @param  string  $event
     * @return $this
     */
    public function after($event)
    {
        $this->event = ['AFTER', strtoupper($event)];

        return $this;
    }

    /**
     * Set the event type to a before event.
     *
     * @param  string  $event
     * @return $this
     */
    public function before($event)
    {
        $this->event = ['BEFORE', strtoupper($event)];

        return $this;
    }

    /**
     * Set the table for the trigger.
     *
     * @param  string  $table
     * @return $this
     */
    public function on($table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Create the trigger.
     *
     * @param  \Closure  $callback
     * @return boolean
     */
    public function create(Closure $callback)
    {
        $statement = "CREATE TRIGGER %s %s %s ON `%s`\nFOR EACH ROW\nBEGIN\n\t%s\nEND;\n";

        list($type, $event, $table, $queries) = array_merge($this->event, [$this->table, []]);

        collect($this->query->pretend(function () use ($callback) {
            call_user_func($callback, $this->query);
        }))->each(function ($query) use (&$queries) {
            $queries[] = str_replace_array('\?', $query['bindings'], $query['query']).';';
        });

        return $this->query->unprepared(
            sprintf($statement, $this->name($type, $event, $table), $type, $event, $table, implode("\n\t", $queries))
        );
    }

    /**
     * Drop a trigger.
     *
     * @return boolean
     */
    public function drop()
    {
        list($type, $event, $table) = array_merge($this->event, [$this->table]);

        return $this->query->unprepared(
            sprintf("DROP TRIGGER `%s`.`%s`;", $table, $this->name($type, $event, $table))
        );
    }

    /**
     * Create a unique trigger name.
     *
     * @param  string  $type
     * @param  string  $event
     * @param  string  $table
     * @return string
     */
    protected function name($type, $event, $table)
    {
        return strtolower(sprintf("%s_%s_%s", $type, $event, $table));
    }
}
