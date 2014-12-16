<?php

namespace Map;

use \Amigo;
use \AmigoQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'amigo' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AmigoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AmigoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'amigosecreto';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'amigo';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Amigo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Amigo';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id field
     */
    const COL_ID = 'amigo.id';

    /**
     * the column name for the nome field
     */
    const COL_NOME = 'amigo.nome';

    /**
     * the column name for the id_sorteado field
     */
    const COL_ID_SORTEADO = 'amigo.id_sorteado';

    /**
     * the column name for the dt_sorteio field
     */
    const COL_DT_SORTEIO = 'amigo.dt_sorteio';

    /**
     * the column name for the foto field
     */
    const COL_FOTO = 'amigo.foto';

    /**
     * the column name for the mensagem field
     */
    const COL_MENSAGEM = 'amigo.mensagem';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Nome', 'IdSorteado', 'DtSorteio', 'Foto', 'Mensagem', ),
        self::TYPE_CAMELNAME     => array('id', 'nome', 'idSorteado', 'dtSorteio', 'foto', 'mensagem', ),
        self::TYPE_COLNAME       => array(AmigoTableMap::COL_ID, AmigoTableMap::COL_NOME, AmigoTableMap::COL_ID_SORTEADO, AmigoTableMap::COL_DT_SORTEIO, AmigoTableMap::COL_FOTO, AmigoTableMap::COL_MENSAGEM, ),
        self::TYPE_FIELDNAME     => array('id', 'nome', 'id_sorteado', 'dt_sorteio', 'foto', 'mensagem', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Nome' => 1, 'IdSorteado' => 2, 'DtSorteio' => 3, 'Foto' => 4, 'Mensagem' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'nome' => 1, 'idSorteado' => 2, 'dtSorteio' => 3, 'foto' => 4, 'mensagem' => 5, ),
        self::TYPE_COLNAME       => array(AmigoTableMap::COL_ID => 0, AmigoTableMap::COL_NOME => 1, AmigoTableMap::COL_ID_SORTEADO => 2, AmigoTableMap::COL_DT_SORTEIO => 3, AmigoTableMap::COL_FOTO => 4, AmigoTableMap::COL_MENSAGEM => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'nome' => 1, 'id_sorteado' => 2, 'dt_sorteio' => 3, 'foto' => 4, 'mensagem' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('amigo');
        $this->setPhpName('Amigo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Amigo');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('amigo_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', false, 200, null);
        $this->addColumn('id_sorteado', 'IdSorteado', 'INTEGER', false, null, null);
        $this->addColumn('dt_sorteio', 'DtSorteio', 'TIMESTAMP', false, null, null);
        $this->addColumn('foto', 'Foto', 'VARCHAR', false, 200, null);
        $this->addColumn('mensagem', 'Mensagem', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? AmigoTableMap::CLASS_DEFAULT : AmigoTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Amigo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AmigoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AmigoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AmigoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AmigoTableMap::OM_CLASS;
            /** @var Amigo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AmigoTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = AmigoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AmigoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Amigo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AmigoTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(AmigoTableMap::COL_ID);
            $criteria->addSelectColumn(AmigoTableMap::COL_NOME);
            $criteria->addSelectColumn(AmigoTableMap::COL_ID_SORTEADO);
            $criteria->addSelectColumn(AmigoTableMap::COL_DT_SORTEIO);
            $criteria->addSelectColumn(AmigoTableMap::COL_FOTO);
            $criteria->addSelectColumn(AmigoTableMap::COL_MENSAGEM);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.nome');
            $criteria->addSelectColumn($alias . '.id_sorteado');
            $criteria->addSelectColumn($alias . '.dt_sorteio');
            $criteria->addSelectColumn($alias . '.foto');
            $criteria->addSelectColumn($alias . '.mensagem');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(AmigoTableMap::DATABASE_NAME)->getTable(AmigoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AmigoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AmigoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AmigoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Amigo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Amigo object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AmigoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Amigo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AmigoTableMap::DATABASE_NAME);
            $criteria->add(AmigoTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AmigoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AmigoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AmigoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the amigo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AmigoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Amigo or Criteria object.
     *
     * @param mixed               $criteria Criteria or Amigo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AmigoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Amigo object
        }

        if ($criteria->containsKey(AmigoTableMap::COL_ID) && $criteria->keyContainsValue(AmigoTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AmigoTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AmigoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AmigoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AmigoTableMap::buildTableMap();
