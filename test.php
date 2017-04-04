<?php
    // needs curl to be available
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/DarwinBoxTest2/index.php/api/employee/attendance/");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, array('emp_id'=>'1','org_id'=>'2','timestamp'=>'2017/04/04', 'status' => '2'));//Setting post data as xml
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-API-KEY: 574691CC44C92C0408202E9A1D463072','Content-Type: application/x-www-form-urlencoded'));
    $result = curl_exec($curl);
    curl_close($curl);
    print($result);


?>