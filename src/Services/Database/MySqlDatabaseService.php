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
        $contacts = $this->container->connection->query("SELECT * FROM visitors");

        return $contacts->fetchAll(PDO::FETCH_COLUMN);
    }


    /**
     * Insert to the table
     *
     * @param string $name
     * @param string $email
     * @param string $message
     *
     * @return int $affectedRows
     */
    public function insert($name, $email, $message)
    {
        return $this->container->connection->insert(
            'visitors',
            [
                'name' => $name,
                'email' => $email,
                'message' => $message,
            ]
        );
    }

}