<?php
//-----class returning sql string for the manager
class ManagerParameters
{
    private $sqlCol;
    private $sqlColString;
    private $sqlPreparedValues;
    private $sqlSetString;
    private $sqlUpdateString;

    public function __construct($colArray)
    {

        $this->setSqlCol($colArray);
        $this->setSqlColString(implode(", ", $this->getSqlCol()));


        $prepared = [];
        foreach ($this->getSqlCol() as $ind => $strg) {
            array_push($prepared, ":" . $strg);
        }
        $this->setSqlPreparedValues(implode(", ", $prepared));

        $updateSring = "";
        foreach ($colArray as $col => $value) {
            $updateSring = $updateSring . substr($col, 1) . " = '" . $value . "'";
            if ($col != array_key_last($colArray)) {
                $updateSring = $updateSring . ", ";
            }
        }
        $this->setSqlUpdateString($updateSring);
    }



    /**
     * Get the value of sqlCol
     */
    public function getSqlCol()
    {
        return $this->sqlCol;
    }

    /**
     * Set the value of sqlCol
     * @return  self
     */
    public function setSqlCol($sqlCol)
    {
        $tab = [];
        foreach ($sqlCol as $ind => $val) {
            array_push($tab, substr($ind, 1));
        }
        $this->sqlCol = $tab;

        return $this;
    }



    /**
     * Get the value of sqlColString
     */
    public function getSqlColString()
    {
        return $this->sqlColString;
    }

    /**
     * Set the value of sqlColString
     *
     * @return  self
     */
    public function setSqlColString($sqlColString)
    {
        $this->sqlColString = $sqlColString;

        return $this;
    }

    /**
     * Get the value of sqlPreparedValues
     */
    public function getSqlPreparedValues()
    {
        return $this->sqlPreparedValues;
    }

    /**
     * Set the value of sqlPreparedValues
     *
     * @return  self
     */
    public function setSqlPreparedValues($sqlPreparedValues)
    {
        $this->sqlPreparedValues = $sqlPreparedValues;

        return $this;
    }

    /**
     * Get the value of sqlSetString
     */
    public function getSqlSetString()
    {
        return $this->sqlSetString;
    }

    /**
     * Set the value of sqlSetString
     *
     * @return  self
     */
    public function setSqlSetString($sqlSetString)
    {
        $this->sqlSetString = $sqlSetString;

        return $this;
    }

    /**
     * Get the value of sqlUpdateString
     */
    public function getSqlUpdateString()
    {
        return $this->sqlUpdateString;
    }

    /**
     * Set the value of sqlUpdateString
     *
     * @return  self
     */
    public function setSqlUpdateString($sqlUpdateString)
    {
        $this->sqlUpdateString = $sqlUpdateString;

        return $this;
    }
}