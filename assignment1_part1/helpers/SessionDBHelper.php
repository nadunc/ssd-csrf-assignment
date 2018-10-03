<?php


class SessionDBHelper extends SQLite3
{
    private $DB_FILE_NAME = "helpers/session.sqlite.db";
    private $TABLE_NAME = "sessiondata";
    private $COLUMN_NAME_SESSION_ID = "session_id";
    private $COLUMN_NAME_CSRF = "csrf";

    function __construct()
    {
        $this->createTable();
    }


    private function createTable()
    {
        $this->open($this->DB_FILE_NAME);

        $sql = "CREATE TABLE IF NOT EXISTS $this->TABLE_NAME ($this->COLUMN_NAME_SESSION_ID TEXT NOT NULL, $this->COLUMN_NAME_CSRF TEXT NOT NULL);";

        $ret = $this->exec($sql);
        if (!$ret) {
            echo $this->lastErrorMsg();
        }

        $this->close();
    }


    function insertRecord($session_id, $csrf)
    {
        $this->open($this->DB_FILE_NAME);

        $sql = "INSERT INTO $this->TABLE_NAME ($this->COLUMN_NAME_SESSION_ID, $this->COLUMN_NAME_CSRF) VALUES ('$session_id', '$csrf');";

        $ret = $this->exec($sql);
        if (!$ret) {
            echo $this->lastErrorMsg();
        }

        $this->close();
    }


    function findCSRFTokenBySessionId($session_id)
    {
        $this->open($this->DB_FILE_NAME);

        $csrf = "";
        $sql = "SELECT CSRF from SESSIONDATA WHERE SESSION_ID='$session_id';";

        $ret = $this->query($sql);
        if ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $csrf = $row[$this->COLUMN_NAME_CSRF];
        }
        $this->close();

        return $csrf;
    }
}