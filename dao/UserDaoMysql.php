<?php
require_once 'models/User.php';

class UserDaoMysql implements UserDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    private function generateUser($array, $full = false) {
        $u = new User();
        $u->id = $array['id'] ?? 0;
        $u->email = $array['email'] ?? '';
        $u->password = $array['password'] ?? '';
        $u->name = $array['name'] ?? '';
        $u->birthdate = $array['birthdate'] ?? '';
        $u->avatar = $array['avatar'] ?? '';
        $u->token = $array['token'] ?? '';

        return $u;
    }

    public function findByToken($token) {
        if(!empty($token)) {
            $sql = $this->pdo->prepare("SELECT * FROM users WHERE token = :token");
            $sql->bindValue(':token', $token);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;

            }
        }

        return false;
    }

    
    public function findByEmail($email) {
        if(!empty($email)) {
            $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;

            }
        }

        return false;
    }

    public function findById($id, $full = false) {
        if(!empty($id)) {
            $sql = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data, $full);
                return $user;
            }
        }

        return false;
    }

    public function findByName($name) {
        $array = [];
        
        if(!empty($name)) {
            // 
            $sql = $this->pdo->prepare("SELECT * FROM users WHERE name LIKE :name");
            $sql->bindValue(':name', '%'.$name.'%');
            $sql->execute();

            if($sql->rowCount() > 0) {
                $data = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach ($data as $item) {
                    $array[] = $this->generateUser($item);
                }
            }
        }

        return $array;
    }

    public function update(User $u) {
        $sql = $this->pdo->prepare("UPDATE users SET 
            email = :email,
            password = :password,
            name = :name, 
            birthdate = :birthdate,
            avatar = :avatar,
            token = :token
            WHERE id = :id");

        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':password', $u->password);
        $sql->bindValue(':name', $u->name);
        $sql->bindValue(':birthdate', $u->birthdate);
        $sql->bindValue(':avatar', $u->avatar);
        $sql->bindValue(':token', $u->token);
        $sql->bindValue(':id', $u->id);
        $sql->execute();

        return true;
    }

    public function insert(User $u) {
        $sql = $this->pdo->prepare("INSERT INTO users (
            email, password, name, birthdate, token
        ) VALUES (
            :email, :password, :name, :birthdate, :token
        )");

        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':password', $u->password);
        $sql->bindValue(':name', $u->name);
        $sql->bindValue(':birthdate', $u->birthdate);
        $sql->bindValue(':token', $u->token);
        $sql->execute();

        return true;
    }
}