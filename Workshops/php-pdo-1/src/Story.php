<?php

class Story
{
    public function __construct(private string $title = "", private string $content = "", private string $author = "")
    {
    }

    public function saveToDatabase(PDO $pdo): void
    {
        $sql = "INSERT INTO story(title, content, author) VALUES (:title, :content, :author);";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":title", $this->title, PDO::PARAM_STR);
        $statement->bindParam(":content", $this->content, PDO::PARAM_STR);
        $statement->bindParam(":author", $this->author, PDO::PARAM_STR);
        $statement->execute();
    }

    public static function fetchFromDatabase(PDO $pdo): array
    {
        $sql = "SELECT * from story ORDER BY id DESC;";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return array_map(function ($story) {
            return new Story($story["title"], $story["content"], $story["author"]);
        }, $statement->fetchAll());
    }

    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the value of title
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Get the value of title
     */
    public function getAuthor(): string
    {
        return $this->author;
    }
}
