<?php

namespace Apolune\Core\Database;

use stdClass;

class Trigger
{
    /**
     * Holds the trigger class.
     *
     * @var \stdClass
     */
    protected $trigger;

    /**
     * Create a new trigger instance.
     *
     * @param  mixed  $trigger
     */
    public function __construct($timing, $event = null, $table = null)
    {
        if ($timing instanceof stdClass) {
            return $this->trigger = $timing;
        }

        $this->trigger = (object) [
            'Trigger'   => strtolower(sprintf("%s_%s_%s", $timing, $event, $table)),
            'Timing'    => $timing,
            'Event'     => $event,
            'Table'     => $table,
            'Statement' => "BEGIN\n\nEND",
        ];
    }

    /**
     * Return the trigger name.
     *
     * @return string
     */
    public function name()
    {
        return $this->trigger->Trigger;
    }

    /**
     * Return the trigger event.
     *
     * @return string
     */
    public function event()
    {
        return strtoupper($this->trigger->Event);
    }

    /**
     * Return the trigger timing.
     *
     * @return string
     */
    public function timing()
    {
        return strtoupper($this->trigger->Timing);
    }

    /**
     * Return the trigger table.
     *
     * @return string
     */
    public function table()
    {
        return $this->trigger->Table;
    }

    /**
     * Return the raw trigger statement.
     *
     * @return string
     */
    public function rawStatement()
    {
        preg_match("/^\s?BEGIN(\n)?(.*?)(\n)?END\s?$/is", $this->trigger->Statement, $matches);

        return $matches[2];
    }

    /**
     * Return the trigger statement.
     *
     * @return string
     */
    public function statement()
    {
        $statement = $this->rawStatement();

        $revisions = $this->getRevisions();

        foreach ($revisions as $revision) {
            $statement = str_replace($revision['original'], null, $statement);
        }

        return trim($statement);
    }

    /**
     * Update the trigger statement.
     *
     * @param  string  $content
     * @return string
     */
    public function update($content)
    {
        return trim(sprintf("%s\n%s", $content, $this->backup()));
    }

    /**
     * Create a new revision out of the current statement.
     *
     * @return string
     */
    protected function backup()
    {
        if (empty($this->statement())) {
            return null;
        }

        list($start, $close) = $this->tags();

        $statement = sprintf("%s\n%s\n%s", $start, str_replace("\t", null, $this->statement()), $close);

        $revisions = $this->getRevisions();

        foreach ($revisions as $revision) {
            $statement .= sprintf("\n\n%s", $revision['original']);
        }

        return trim($statement);
    }

    /**
     * Rollback to a previous revision.
     *
     * @return string
     */
    public function rollback()
    {
        $revisions = $this->getRevisions();

        $rollback = head($revisions);

        $statement = $rollback['statement'];

        foreach ($revisions as $revision) {
            if ($revision['revision'] === $rollback['revision']) continue;

            $statement .= sprintf("\n\n%s", $revision['original']);
        }

        return trim($statement);
    }

    /**
     * Return all of the available revisions.
     *
     * @return array
     */
    public function getRevisions()
    {
        preg_match_all('/\/\*\s?REV\s?([a-z0-9]{7})\s?\*\/\/\*\s?(.*?)\s?\*\/\/\*\s?\1\s?\*\//is', $this->rawStatement(), $matches);

        $revisions = [];

        foreach ($matches[0] as $key => $match) {
            $revisions[$revision = $matches[1][$key]] = [
                'revision'  => $revision,
                'statement' => $matches[2][$key],
                'original'  => $match,
            ];
        }

        return $revisions;
    }

    /**
     * Get a specific revision.
     *
     * @param  string  $revision
     * @return array
     */
    public function getRevision($revision)
    {
        return head(array_filter($this->getRevisions(), function ($item) use ($revision) {
            return strtolower($item['revision']) === strtolower($revision);
        }));
    }

    /**
     * Create a new revision batch.
     *
     * @return array
     */
    protected function tags()
    {
        $revision = substr(sha1(time()), 0, 7);

        return [
            sprintf("/* REV %s *//*", $revision),
            sprintf("*//* %s */", $revision),
        ];
    }
}
