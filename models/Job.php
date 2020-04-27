<?php

class Job {

    public static function create($options) {
        $db = Db::getConnection();

        $sql = 'INSERT INTO jobs(name, email, text) VALUES (:name, :email, :text)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':text', $options['text'], PDO::PARAM_STR);

        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return false;
    }

    public static function getList($page, $count = 3, $request = []) {

        $db = Db::getConnection();

        $order = 'ORDER BY name ASC';

        if(isset($request['order']) && isset($request['type'])) {
            $order = 'ORDER BY '. $request['order'] .' '. $request['type'];
        }

        $result = $db->query('SELECT * FROM jobs '.$order.' LIMIT '. $count .' OFFSET '. ($page - 1) * $count);
        return $result->fetchAll();

    }

    public static function deleteById($id) {
        $db = Db::getConnection();
        $sql = 'DELETE FROM jobs WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getById($id) {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM jobs WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    public static function update($id, $options) {
        $db = Db::getConnection();


        $sql = "UPDATE jobs
            SET 
                name = :name, 
                email = :email, 
                text = :text, 
                status = :status, 
                is_edit = :is_edit
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':text', $options['text'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status']);
        $result->bindParam(':is_edit', $options['is_edit']);

        return $result->execute();
    }

    public static function getTotalJobs() {
        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM jobs';

        $result = $db->prepare($sql);

        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }

}

