<?php


namespace Oaattia\ContactForm\Services\Database;


use Doctrine\DBAL\Schema\Schema;
use Interop\Container\ContainerInterface;

class MySqlDatabaseService
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * MySqlDatabaseService constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public function findAll() : array
    {
        $contacts = $this->container->connection->query("SELECT * FROM contacts");

        return $contacts->fetchAll(PDO::FETCH_COLUMN);
    }


}