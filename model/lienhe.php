<?php
require_once(__DIR__ . "/../model/database.php");
class LIENHE{
	private $id;
    private $hoten;
    private $email;
    private $tuoi;
	private $diachi;
    private $tenkhoahoc;
    private $sdt;
    private $noidung;
   
    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
	
    public function gethoten(){ return $this->hoten; }
    public function sethoten($value){ $this->hoten = $value; }

	public function gettuoi(){ return $this->tuoi; }
    public function settuoi($value){ $this->tuoi = $value; }

    public function getemail(){ return $this->email; }
    public function setemail($value){ $this->email = $value; }

	public function getdiachi(){ return $this->diachi; }
    public function setdiachi($value){ $this->diachi = $value; }

	public function gettenkhoahoc(){ return $this->tenkhoahoc; }
    public function settenkhoahoc($value){ $this->tenkhoahoc = $value; }

    public function getsdt(){ return $this->sdt; }
    public function setsdt($value){ $this->sdt = $value; }

    public function getnoidung(){ return $this->noidung; }
    public function setnoidung($value){ $this->noidung = $value; }
	
   
    public function themlienhe($hoten,$tuoi,$email,$diachi,$tenkhoahoc, $sdt ,$noidung){
		$db = DATABASE::connect();      

		try{
			$sql = "INSERT INTO lienhe( hoten, tuoi, email, diachi, tenkhoahoc, sdt, noidung) VALUES(:hoten,:tuoi,:email,:diachi,:tenkhoahoc,:sdt,:noidung)";
			$cmd = $db->prepare($sql);
      		$cmd->bindValue(':hoten', $hoten);
			  $cmd->bindValue(':tuoi', $tuoi);
			$cmd->bindValue(':email', $email);
			$cmd->bindValue(':sdt', $sdt);
			$cmd->bindValue(':diachi', $diachi);
			$cmd->bindValue(':tenkhoahoc', $tenkhoahoc);
			$cmd->bindValue(':noidung', $noidung);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

    // public function laythonglienhe($id){
	// 	$db = DATABASE::connect();
	// 	try{
	// 		$sql = "SELECT * FROM lienhe WHERE id=:id";
	// 		$cmd = $db->prepare($sql);
	// 		$cmd->bindValue(":id", $id);
	// 		$cmd->execute();
	// 		$ketqua = $cmd->fetch();
	// 		$cmd->closeCursor();
	// 		return $ketqua;
	// 	}
	// 	catch(PDOException $e){
	// 		$error_message=$e->getMessage();
	// 		echo "<p>Lỗi truy vấn: $error_message</p>";
	// 		exit();
	// 	}
	// }



}