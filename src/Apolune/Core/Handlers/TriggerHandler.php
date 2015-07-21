<?php

namespace Apolune\Core\Handlers;

use Closure;
use Apolune\Core\Database\Trigger;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Query\Grammars\Grammar;

class TriggerHandler
{
    /**
     * Holds the DatabaseManager implementation.
     *
     * @var \Illuminate\Database\DatabaseManager
     */
    protected $query;

    /**
     * Holds the trigger timing.
     *
     * @var string
     */
    protected $timing;

    /**
     * Holds the trigger event.
     *
     * @var string
     */
    protected $event;

    /**
     * Holds the trigger table.
     *
     * @var string
     */
    protected $table;

    /**
     * Create a new trigger handler instance.
     *
     * @param  \Illuminate\Database\DatabaseManager  $query
     */
    public function __construct(DatabaseManager $query)
    {
        $this->query = $query;
    }

    /**
     * Set the after event timing.
     *
     * @param  string  $timing
     * @return $this
     */
    public function after($timing)
    {
        $this->timing = 'AFTER';

        $this->event = strtoupper($timing);

        return $this;
    }

    /**
     * Set the before event timing.
     *
     * @param  string  $timing
     * @return $this
     */
    public function before($timing)
    {
        $this->timing = 'BEFORE';

        $this->event = strtoupper($timing);

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
     * @param  mixed  $callback
     * @param  string  $name  null
     * @return void
     */
    public function create($callback, $name = null)
    {
        $queries = $callback instanceof Closure ? $this->getQueries($callback) : $callback;

        if ($trigger = $this->get($this->timing, $this->event, $this->table)) {
            return $this->update($trigger, $queries);
        }

        $trigger = new Trigger($this->timing, $this->event, $this->table);

        $statement = "CREATE TRIGGER %s %s %s ON `%s`\nFOR EACH ROW\nBEGIN\n\t%s\nEND;\n";

        return $this->query->unprepared(
            sprintf($statement, $name ?: $trigger->name(), $trigger->timing(), $trigger->event(), $trigger->table(), trim($queries))
        );
    }

    /**
     * Update an existing trigger.
     *
     * @param  \Apolune\Core\Database\Trigger  $trigger
     * @param  string  $statement
     * @return void
     */
    protected function update(Trigger $trigger, $statement)
    {
        $statement = $trigger->update(
            sprintf("%s\n%s", $trigger->statement(), $statement)
        );

        $name = $trigger->name();

        $this->drop($trigger);

        $this->create($statement, $name);
    }

    /**
     * Rollback, or drop a trigger.
     *
     * @return void
     */
    public function rollback()
    {
        $trigger = $this->get($this->timing, $this->event, $this->table);

        if (empty($trigger->getRevisions())) {
            return $this->drop($trigger->name());
        }

        $statement = $trigger->rollback();

        $name = $trigger->name();

        $this->drop($trigger);

        $this->create($statement, $name);
    }

    /**
     * Drop a trigger.
     *
     * @param  \Apolune\Core\Database\Trigger  $trigger  null
     * @return boolean
     */
    public function drop($trigger = null)
    {
        $name = $trigger instanceof Trigger ? $trigger->name() : $this->name($this->timing, $this->event, $this->table);

        return $this->query->unprepared(
            sprintf("DROP TRIGGER `%s`;", $name)
        );
    }

    /**
     * Get a specific trigger.
     *
     * @param  string  $timing
     * @param  string  $event
     * @param  string  $table
     * @return \stdClass
     */
    public function get($timing, $event, $table)
    {
        $statement = 'SHOW TRIGGERS WHERE `Timing` = ? AND `Event` = ? AND `Table` = ?;';

        $query = $this->query->selectOne($statement, func_get_args());

        return $query ? new Trigger($query) : false;
    }

    /**
     * Check if a specific trigger exists.
     *
     * @param  string  $timing
     * @param  string  $event
     * @param  string  $table
     * @return \stdClass
     */
    public function has($timing, $event, $table)
    {
        return (boolean) $this->get($timing, $event, $table);
    }

    /**
     * Return all the executed queries as actual querystrings.
     *
     * @param  \Closure  $callback
     * @return array
     */
    protected function getQueries(Closure $callback)
    {
        list($statement, $queries) = [[], $this->getPreparedQueries($callback)];

        foreach ($queries as $query) {
            $statement[] = sprintf("\t%s;\n", $this->bindParameters($query['query'], $query['bindings']));
        }

        return implode(null, $statement);
    }

    /**
     * Get all of the executed queries.
     *
     * @param  \Closure  $callback
     * @return array
     */
    protected function getPreparedQueries(Closure $callback)
    {
        return $this->query->pretend(function () use ($callback) {
            call_user_func($callback, $this->query);
        });
    }

    /**
     * Bind parameters to a query.
     *
     * @param  string  $query
     * @param  array  $bindings
     * @return string
     */
    protected function bindParameters($query, array $bindings)
    {
        $database = $this->query;

        array_walk($bindings, function (&$binding) use ($database) {
            $binding = is_integer($binding) ? (int) $binding : $database->connection()->getPdo()->quote($binding);
        });

        return str_replace_array('\?', $bindings, $query);
    }

    /**
     * Create a unique trigger name.
     *
     * @param  string  $timing
     * @param  string  $event
     * @param  string  $table
     * @return string
     */
    protected function name($timing, $event, $table)
    {
        return strtolower(sprintf("%s_%s_%s", $timing, $event, $table));
    }
}
