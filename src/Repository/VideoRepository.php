<?php

namespace Videoteca\Mvc\Repository;
use PDO;
use Videoteca\Mvc\Entity\Video;

class VideoRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function create(Video $video): bool
    {
        $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);

        $result = $statement->execute();

        $video->setId($this->pdo->lastInsertId());

        return $result;
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM videos WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);

        return $statement->execute();
    }

    public function update(Video $video): bool
    {
        $sql = 'UPDATE videos SET url = :url, title = :title WHERE id = :id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':url', $video->url);
        $statement->bindValue(':title', $video->title);
        $statement->bindValue(':id', $video->id, PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * @return Video[]
     */
    public function all(): array
    {
        $videoList = $this->pdo->query("SELECT * FROM videos;")->fetchAll(PDO::FETCH_ASSOC);
        
        return array_map(function (array $videoData)
            {
                $video = new Video($videoData['url'], $videoData['title']);
                $video->setId($videoData['id']);

                return $video;
            }, 
            $videoList
        );
    }
}