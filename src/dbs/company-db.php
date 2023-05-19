<?php 
    require_once('../db.php') ;
    
    function add($email, $companyName, $address)
    {   
        $area = getAreaByAddress($address);

        $connect = openConnection();
        $stm = $connect->prepare("insert into company values(?, ?, ?, '', ?)");
        $stm->bind_param('ssss',$email, $companyName, $address, $area);
        $stm->execute();
        
        if($stm->affected_rows == 1)
            return true;
        
        return false;
    }

    function update($email, $companyName, $address, $website)
    {
        $area = getAreaByAddress($address);

        $connect = openConnection();

        $stm = $connect->prepare('update company set companyName = ?, address = ?, website = ?, area = ? where email = ?');
        $stm->bind_param('sssss', $companyName, $address, $website, $area, $email);
        $stm->execute();

        return $stm->affected_rows == 1 ;
    }

    function getAreaByAddress($address) 
    {
        // Các tỉnh thành ở miền bắc
        $north = [
            "Hà Nội", "Hà Giang", "Cao Bằng", "Bắc Kạn", "Tuyên Quang", "Lào Cai", "Điện Biên", "Lai Châu", "Sơn La", "Yên Bái", "Hòa Bình", "Thái Nguyên", "Lạng Sơn", "Quảng Ninh", "Bắc Giang", "Phú Thọ", "Vĩnh Phúc", "Bắc Ninh", "Hải Dương", "Hưng Yên", "Thái Bình", "Hà Nam", "Nam Định"
        ];

        // Các tỉnh thành ở miền nam
        $southern = [
            "Hồ Chí Minh", "Tây Ninh", "Bình Dương", "Bình Phước", "Đồng Nai", "Bà Rịa - Vũng Tàu", "Long An", "Tiền Giang", "Bến Tre", "Trà Vinh", "Vĩnh Long", "Đồng Tháp", "An Giang", "Kiên Giang", "Cần Thơ", "Hậu Giang", "Sóc Trăng", "Bạc Liêu", "Cà Mau"
        ];

        // Các tỉnh thành ở miền trung
        $central = [
            "Thanh Hóa", "Nghệ An", "Hà Tĩnh", "Quảng Bình", "Quảng Trị", "Thừa Thiên - Huế", "Đà Nẵng", "Quảng Nam", "Quảng Ngãi", "Bình Định", "Phú Yên", "Khánh Hòa", "Ninh Thuận", "Bình Thuận"
        ];

        $area = "";

        foreach($north as $i)
            if(strpos($address, $i) !== false) {
                $area = "Miền bắc";
                break;
            }

        foreach($southern as $i)
            if(strpos($address, $i) !== false) {
                $area = "Miền nam";
                break;
            }

        foreach($central as $i)
            if(strpos($address, $i) !== false) {
                $area = "Miền trung";
                break;
            }    
        
        return $area;
    }

    function get($emailCompany)
    {
        $connect = openConnection() ;

        $selected = $connect->prepare('select companyName, address, website from company where email = ?') ; 
        $selected->bind_param('s', $emailCompany);

        $selected->execute();
        $result = $selected->get_result();
        $company = $result->fetch_assoc() ;
        
        return $company ;
    }
?>