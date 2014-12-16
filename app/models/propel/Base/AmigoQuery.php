<?php

namespace Base;

use \Amigo as ChildAmigo;
use \AmigoQuery as ChildAmigoQuery;
use \Exception;
use \PDO;
use Map\AmigoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'amigo' table.
 *
 *
 *
 * @method     ChildAmigoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAmigoQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildAmigoQuery orderByIdSorteado($order = Criteria::ASC) Order by the id_sorteado column
 * @method     ChildAmigoQuery orderByDtSorteio($order = Criteria::ASC) Order by the dt_sorteio column
 * @method     ChildAmigoQuery orderByFoto($order = Criteria::ASC) Order by the foto column
 * @method     ChildAmigoQuery orderByMensagem($order = Criteria::ASC) Order by the mensagem column
 *
 * @method     ChildAmigoQuery groupById() Group by the id column
 * @method     ChildAmigoQuery groupByNome() Group by the nome column
 * @method     ChildAmigoQuery groupByIdSorteado() Group by the id_sorteado column
 * @method     ChildAmigoQuery groupByDtSorteio() Group by the dt_sorteio column
 * @method     ChildAmigoQuery groupByFoto() Group by the foto column
 * @method     ChildAmigoQuery groupByMensagem() Group by the mensagem column
 *
 * @method     ChildAmigoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAmigoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAmigoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAmigo findOne(ConnectionInterface $con = null) Return the first ChildAmigo matching the query
 * @method     ChildAmigo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAmigo matching the query, or a new ChildAmigo object populated from the query conditions when no match is found
 *
 * @method     ChildAmigo findOneById(int $id) Return the first ChildAmigo filtered by the id column
 * @method     ChildAmigo findOneByNome(string $nome) Return the first ChildAmigo filtered by the nome column
 * @method     ChildAmigo findOneByIdSorteado(int $id_sorteado) Return the first ChildAmigo filtered by the id_sorteado column
 * @method     ChildAmigo findOneByDtSorteio(string $dt_sorteio) Return the first ChildAmigo filtered by the dt_sorteio column
 * @method     ChildAmigo findOneByFoto(string $foto) Return the first ChildAmigo filtered by the foto column
 * @method     ChildAmigo findOneByMensagem(string $mensagem) Return the first ChildAmigo filtered by the mensagem column
 *
 * @method     ChildAmigo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAmigo objects based on current ModelCriteria
 * @method     ChildAmigo[]|ObjectCollection findById(int $id) Return ChildAmigo objects filtered by the id column
 * @method     ChildAmigo[]|ObjectCollection findByNome(string $nome) Return ChildAmigo objects filtered by the nome column
 * @method     ChildAmigo[]|ObjectCollection findByIdSorteado(int $id_sorteado) Return ChildAmigo objects filtered by the id_sorteado column
 * @method     ChildAmigo[]|ObjectCollection findByDtSorteio(string $dt_sorteio) Return ChildAmigo objects filtered by the dt_sorteio column
 * @method     ChildAmigo[]|ObjectCollection findByFoto(string $foto) Return ChildAmigo objects filtered by the foto column
 * @method     ChildAmigo[]|ObjectCollection findByMensagem(string $mensagem) Return ChildAmigo objects filtered by the mensagem column
 * @method     ChildAmigo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AmigoQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\AmigoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'amigosecreto', $modelName = '\\Amigo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAmigoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAmigoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAmigoQuery) {
            return $criteria;
        }
        $query = new ChildAmigoQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAmigo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AmigoTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AmigoTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAmigo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome, id_sorteado, dt_sorteio, foto, mensagem FROM amigo WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAmigo $obj */
            $obj = new ChildAmigo();
            $obj->hydrate($row);
            AmigoTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAmigo|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAmigoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AmigoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAmigoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AmigoTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmigoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AmigoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AmigoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmigoTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%'); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmigoQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nome)) {
                $nome = str_replace('*', '%', $nome);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AmigoTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the id_sorteado column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSorteado(1234); // WHERE id_sorteado = 1234
     * $query->filterByIdSorteado(array(12, 34)); // WHERE id_sorteado IN (12, 34)
     * $query->filterByIdSorteado(array('min' => 12)); // WHERE id_sorteado > 12
     * </code>
     *
     * @param     mixed $idSorteado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmigoQuery The current query, for fluid interface
     */
    public function filterByIdSorteado($idSorteado = null, $comparison = null)
    {
        if (is_array($idSorteado)) {
            $useMinMax = false;
            if (isset($idSorteado['min'])) {
                $this->addUsingAlias(AmigoTableMap::COL_ID_SORTEADO, $idSorteado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSorteado['max'])) {
                $this->addUsingAlias(AmigoTableMap::COL_ID_SORTEADO, $idSorteado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmigoTableMap::COL_ID_SORTEADO, $idSorteado, $comparison);
    }

    /**
     * Filter the query on the dt_sorteio column
     *
     * Example usage:
     * <code>
     * $query->filterByDtSorteio('2011-03-14'); // WHERE dt_sorteio = '2011-03-14'
     * $query->filterByDtSorteio('now'); // WHERE dt_sorteio = '2011-03-14'
     * $query->filterByDtSorteio(array('max' => 'yesterday')); // WHERE dt_sorteio > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtSorteio The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmigoQuery The current query, for fluid interface
     */
    public function filterByDtSorteio($dtSorteio = null, $comparison = null)
    {
        if (is_array($dtSorteio)) {
            $useMinMax = false;
            if (isset($dtSorteio['min'])) {
                $this->addUsingAlias(AmigoTableMap::COL_DT_SORTEIO, $dtSorteio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtSorteio['max'])) {
                $this->addUsingAlias(AmigoTableMap::COL_DT_SORTEIO, $dtSorteio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmigoTableMap::COL_DT_SORTEIO, $dtSorteio, $comparison);
    }

    /**
     * Filter the query on the foto column
     *
     * Example usage:
     * <code>
     * $query->filterByFoto('fooValue');   // WHERE foto = 'fooValue'
     * $query->filterByFoto('%fooValue%'); // WHERE foto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $foto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmigoQuery The current query, for fluid interface
     */
    public function filterByFoto($foto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($foto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $foto)) {
                $foto = str_replace('*', '%', $foto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AmigoTableMap::COL_FOTO, $foto, $comparison);
    }

    /**
     * Filter the query on the mensagem column
     *
     * Example usage:
     * <code>
     * $query->filterByMensagem('fooValue');   // WHERE mensagem = 'fooValue'
     * $query->filterByMensagem('%fooValue%'); // WHERE mensagem LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mensagem The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmigoQuery The current query, for fluid interface
     */
    public function filterByMensagem($mensagem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mensagem)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mensagem)) {
                $mensagem = str_replace('*', '%', $mensagem);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AmigoTableMap::COL_MENSAGEM, $mensagem, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAmigo $amigo Object to remove from the list of results
     *
     * @return $this|ChildAmigoQuery The current query, for fluid interface
     */
    public function prune($amigo = null)
    {
        if ($amigo) {
            $this->addUsingAlias(AmigoTableMap::COL_ID, $amigo->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the amigo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AmigoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AmigoTableMap::clearInstancePool();
            AmigoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AmigoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AmigoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AmigoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AmigoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AmigoQuery
