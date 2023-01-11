<?php
	session_start();
	if(@$_SESSION["autoriser"]!="oui"){
		header("location:../login.php");
		exit();
	}
	require ("../config.php"); 
	try{
		$id=$_SESSION["id"];
		$sql = "SELECT * FROM cart where user=$id";
        $statement = $db->prepare($sql);
        $statement->execute();
        foreach($statement as $res){
			$id_pro = $res['id_pro'];
			$user = $res['user'];
			$title = $res['title'];
			$description = $res['description'];
			$prix = $res['prix'];
			$quantite = $res['quantite'];
			$image = $res['image'];
			$color = $res['color'];
			$size = $res['Size'];
			$total=$res['total'];
			$sql = 'INSERT INTO command(id_pro,user,title, description,prix, quantite,image,color,Size,total) VALUES(:id_pro, :user, :title, :description,:prix, :quantite, :image, :color, :size, :total)';
			$statement = $db->prepare($sql);
			if ($statement->execute([':id_pro' => $id_pro, ':user' => $user, ':title' => $title, ':description' => $description,':prix'=>$prix, ':quantite' => $quantite, ':image' => $image, ':color' => $color, ':size' => $size, ':total'=>$total])) {
				$message = 'data inserted successfully';
			}
		}
    }catch(Exeception $e){
        echo "Erreur". $e->getmessage();
        exit();
    }
    require_once 'vendor/autoload.php';
    use Dompdf\Dompdf;

    $sql="SELECT * FROM command";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $ts=0;
    $i=1;
    $html='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            h2{
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                text-align:center;
            }
            table{
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width:100%;
            }
            td,th{
                border: 1px solid #444;
                padding: 8px;
                text-align: left;
            }
            .my-table{
                text-align: right;
            }
            #sign{
                padding-top:50px;
                text-align: right;
            }
        </style>
    </head>
    <body>
        <h2>Ticket</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>';
    foreach($rows as $row){
        $html .=' <tr>
            <td>'.$i.'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['prix'].'</td>
            <td>'.$row['quantite'].'</td>
            <td>'.$row['total'].'</td>
        </tr>';
        $ts+=$row['total'];
        $i++;
    }
    $html .='</tbody>
        <tr>
            <th colspan="4" class="my-table">TOTAL</th>
            <th>'.$ts.'</th>
        </tr>
        <tr>
            <td colspan="5" id="sign">signature</td>
        </tr>
        
    </table>
    </body>
    </html>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('Ticket.pdf',['Attachment' => 0]);


?>

           
        