<?php
class TAILIEU{
	private $id;
	private $tenkhoahoc;
    private $duongdan;

    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }

	public function gettenkhoahoc(){ return $this->tenkhoahoc; }
    public function settenkhoahoc($value){ $this->tenkhoahoc = $value; }

	public function getduongdan(){ return $this->duongdan; }
    public function setduongdan($value){ $this->duongdan = $value; }
   
   
    public function themtailieu($tenkhoahoc,$duongdan){
	
			
			$db = DATABASE::connect();      
		try{
			$sql = "INSERT INTO tailieu(tenkhoahoc, duongdan) VALUES(:tenkhoahoc, :duongdan)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':tenkhoahoc', $tenkhoahoc);
			$cmd->bindValue(':duongdan', $duongdan);
			// }
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

	public  function laytailieu()
    {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM tailieu";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

// up load file
	
	// 	$db = DATABASE::connect();

	// // check file is uploaded
	// if(isset($_POST['submit'])){
	// 	$targetDir= "documents/";
	// 	$targetFile = $targetDir . basename($_FILES["tentailieu"]["name"]);
	// 	$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION ));
	// }
	// if($fileType != "pdf, docx, zip, rar" || $_FILES["tentailieu"]["size"] > 2000000){
	// 	echo "Lỗi: File có size nhỏ hơn 2MB";
	// }else{
	// 	if(move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)){
	// 		$tentailieu = $_FILES["tentailieu"]["name"];
	// 		$duongdan = $targetDir;
	// 		// $time_stamp = date('dd-mm-yyyy');
	// 		$sql = "INSERT INTO tailieu( tentailieu, duongdan,ngaytai) 
	// 		VALUES(:tentailieu, :duongdan, :ngaytai)";
		
		
	// 		if($db->query($sql) === TRUE){
	// 			echo "File uploaded successfully";
	// 		}else{
	// 	echo "Lỗi: " .$sql . "<br>" .$db->error;
	// }
	// 	echo " File is loading";
	// }
	





   



}