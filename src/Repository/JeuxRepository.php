<?php
namespace App\Repository;

use App\Entity\Jeux;

/**
 * @return Jeux[];
 */
class JeuxRepository
{
    // findAll / findbyid / persist/ update /delete
    public function listArticle(): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("select * From article ");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Jeux($line['label'], $line['prix'], $line['description'], $line['image'], $line['id_categorie'], $line['id']);
        }
        return $list;
    }
    public function listArticleById(int $id): ?Jeux
    {

        $connection = Database::getConnection();
        $query = $connection->prepare("select * From article where id=:id ");
        $query->bindValue(':id', $id);
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            return new Jeux($line['label'], $line['prix'], $line['description'], $line['image'], $line['id_categorie'], $line['id']);
        }
        return null;
    }





    public function postArticle(Jeux $data)
    {
        $connection = Database::getConnection();
        $query = $connection->prepare("insert into article (id,label,prix,description,image )VALUES(:id,:label,:prix,:description,:image)");
        $query->bindValue(':id', $data->getId());
        $query->bindValue(':label', $data->getLabel());
        $query->bindValue(':prix', $data->getPrix());
        $query->bindValue(':description', $data->getDescription());
        $query->bindValue(':image', $data->getImage());

        $query->execute();
        //  pour prend id en la main 
        $data->setId($connection->lastInsertId());

    }



    public function listArticleByCategorie(int $id_categorie): ?Jeux
    {

        $connection = Database::getConnection();
        $query = $connection->prepare("select * from article where id_categorie=:id_categorie");
        $query->bindValue(':id', $id_categorie);
        $query->execute();


        foreach ($query->fetchAll() as $line) {
            return new Jeux($line['label'], $line['prix'], $line['description'], $line['image'], $line['id']);
        }
        return null;
    }


}