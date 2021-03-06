<?php
require_once '../dbconnect.php';

class UserLogic {

    /**
     * ユーザ情報をデータベースに保存
     * @param array $userdata[]
     * @return bool $result
     */
    static function createUser($userdata) {
        $sql = 'insert into users(name, email, password) values(?, ?, ?)';
        $data[] = $userdata['username'];
        $data[] = $userdata['email'];
        //パスワードのハッシュ化
        $data[] = password_hash($userdata['password'], PASSWORD_DEFAULT);
        $result = false;
        try {
            $stmt = connect()->prepare($sql);
            $result = $stmt -> execute($data);
            return $result;
        } catch (Exception $e) {
            return $result;
        }
    }

     /**
     * ログインチェック
     * @param void
     * @return bool $result
     */

    public static function checkLogin() {
        $result = false;
        if (isset($_SESSION['login_user']['id']) && isset($_SESSION['login_user'])) {
            return $result = true;
        }
        return $result;
    }
}