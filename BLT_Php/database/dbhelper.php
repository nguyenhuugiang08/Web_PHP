<?php
require_once('config.php');

/**
 * Sử dụng cho câu truy vấn insert, delete, update
 */

function execute($sql)
{
    // Mở kết nối database
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'utf8');

    // thực hiện truy vấn
    mysqli_query($con, $sql);

    // Đóng kết nối
    mysqli_close($con);
}

/**
 * Sử dụng cho câu truy vấn select
 */

function executeResult($sql)
{
    // Mở kết nối database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//B2. Thuc hien truy van insert
	$resultset = mysqli_query($conn, $sql);
	$data      = [];

	while (($row = mysqli_fetch_array($resultset)) != null) {
		$data[] = $row;
	}

	//B3. Dong ket noi database
	mysqli_close($conn);

	return $data;
}

function executeResultOne($sql)
{
    // Mở kết nối database
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'utf8');

    // thực hiện truy vấn
    $result = mysqli_query($con, $sql);
    $data = [];

    while(($row = mysqli_fetch_array( $result, 1)) != null){
        $data = $row;
    }

    // Đóng kết nối
    mysqli_close($con);

    return $data;
}