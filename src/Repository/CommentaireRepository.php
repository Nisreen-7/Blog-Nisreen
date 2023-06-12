<?php
namespace App\Repository;

use App\Entity\Commentaire;
use App\Entity\Jeux;

/**
 * @return Commentaire[];
 */

class CommentaireRepository
{
    // findAll / findbyid / persist/ update /delete
    public function listCommentaire(int $id_article): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("select * From commentaire where id_article=:id_article ");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Commentaire($line['commentaire'], $line['id_article'], $line['id']);
        }
        return $list;
    }



    public function addCommentaire(Commentaire $data)
    {
        $connection = Database::getConnection();
        $query = $connection->prepare("insert into commentaire (id,commentaire,id_article )VALUES(:id,:commentaire,:id_article)");
        $query->bindValue(':id', $data->getId());
        $query->bindValue(':commentaire', $data->getCommentaire());
        $query->bindValue(':id_article', $data->getId_jeux());

        $query->execute();
        //  pour prend id en la main 
        $data->setId($connection->lastInsertId());

    }


}