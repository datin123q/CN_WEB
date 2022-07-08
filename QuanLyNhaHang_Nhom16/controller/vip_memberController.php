<?php 

    function get_KH() {
        global $db;
        $query = 'SELECT * FROM khach_hang ORDER BY MA_KHACH_HANG';
        $statement = $db->prepare($query);
        $statement->execute();
        $courses = $statement->fetchAll();
        $statement->closeCursor();
        return $courses;
    }

    function get_ten_KH($ma_KH) {
        if (!$ma_KH) {
            return "All Courses";
        }
        global $db;
        $query = 'SELECT * FROM khach_hang WHERE MA_KHACH_HANG = :ma_KH';
        $statement = $db->prepare($query);
        $statement->bindValue(':ma_KH', $ma_KH);
        $statement->execute();
        $KH = $statement->fetch();
        $statement->closeCursor();
        $ten_KH = $KH['TEN_KHACH_HANG'];
        return $ten_KH;
    }

    function delete_KH($ma_KH) {
        global $db;
        $query = 'UPDATE khach_hang
        SET DEL=1
        WHERE MA_KHACH_HANG= :ma_KH;';
        $statement = $db->prepare($query);
        $statement->bindValue(':ma_KH', $ma_KH);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_KH($ma_KH, $ten_KH, $SDT ) {
        global $db;
        $query = 'INSERT INTO khach_hang (MA_KHACH_HANG, TEN_KHACH_HANG, SO_DIEN_THOAI, TIEN_TICH_LUY, TONG_TIEN, DEL)
              VALUES
                 (:ma_KH, :ten_KH, :SDT, 0, 0, 0)';
        $statement = $db->prepare($query);
        $statement->bindValue(':ma_KH', $ma_KH);
        $statement->bindValue(':ten_KH', $ten_KH);
        $statement->bindValue(':SDT', $SDT);
        $statement->execute();
        $statement->closeCursor();
    }