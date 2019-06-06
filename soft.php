<?php 

    include'conx.php'; 
   
    
        /*if(isset($_POST['email'])){


		function test_email($email,$conn){

			$pdo=$conn->prepare("SELECT * FROM `user` WHERE email=?");
			$pdo->execute([$email]);
  			$pdo->setFetchMode(PDO::FETCH_ASSOC);
  			$order=$pdo->fetch();
            
            return($order);  

		}

		$test_email=test_email($_POST['email'],$conn);

		$tab=[];

		if(empty($_POST['firstname'])){
          
          $tab['firstname']="veuillez entrer votre nom";

		}

		if(empty($_POST['lastname'])){
          
          $tab['lastname']="veuillez entrer votre nom";

		}

		if(empty($_POST['email'])){
          
          $tab['email']= "veuillez entrer votre adresse courriel";

		}elseif((filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))==false){
          
          $tab['email']= "veuillez entrer une adresse courriel valide";

			
		}elseif (empty($test_email)==false) {

		  $tab['email']= " adresse courriel existe";
			
		}

		if(empty($_POST['password'])){
          
          $tab['password']= "veuillez entrer un mot de passe valide";
        }

    }*/

   

     if(empty($_POST['firstname'])==false){

     $pdo=$conn->prepare("INSERT INTO `user`(`firstname`,`lastname`,`email`, `password`) VALUES (?,?,?,?)");

            $insert=[ 

            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email'],
            md5($_POST['password'])   

            ];
          
  			$pdo->execute($insert);

  		$last_id = $conn->lastInsertId();
        
        $pdo=$conn->prepare("SELECT * FROM `user` Where id=?");
        $pdo->execute(array($last_id));
  		$pdo->setFetchMode(PDO::FETCH_ASSOC);
  		$order=$pdo->fetchAll();
        

        echo json_encode($order);

  	}

  	// include('soft.phtml');


 

  	

?>