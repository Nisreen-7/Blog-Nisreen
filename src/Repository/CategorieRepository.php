<?php
namespace App\Repository;

use App\Entity\Categorie;

/**
 * @return Categorie[];
 */

class CategorieRepository
{
    public function listCategorie(): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("select * From categorie ");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Categorie($line['name'], $line['id']);
        }
        return $list;
    }



    public function addCategorie(Categorie $data)
    {
        $connection = Database::getConnection();
        $query = $connection->prepare("insert into categorie (id,name )VALUES(:id,:name)");
        $query->bindValue(':id', $data->getId());
        $query->bindValue(':name', $data->getName());
        $query->execute();
        //  pour prend id en la main 
        $data->setId($connection->lastInsertId());

    }
    public function getCategorieById(int $id): ?Categorie
    {

        $connection = Database::getConnection();
        $query = $connection->prepare("select * From categorie where id=:id ");
        $query->bindValue(':id', $id);
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            return new Categorie($line['name'], $line['id']);
        }
        return null;
    }



}