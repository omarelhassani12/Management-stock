<?php


// // Include the database connection file
// include_once '../include/connexion.php';

// // Check if the form was submitted
// if (isset($_POST["submit"])) {
//     // Validate the form input
//     if (empty($_POST['numero']) || empty($_POST['date_achat']) || empty($_POST['idFournisseur']) || empty($_POST['libelleProduit']) || empty($_POST['referenceProduit']) || empty($_POST['prix_achat']) || empty($_POST['quantite_achetes'])) {
//         $error_message = "All fields are required";
//     } else {
//         // Store the form input in variables
//         $numero = $_POST['numero'];
//         $date_achat = $_POST['date_achat'];
//         $idFournisseur = $_POST['idFournisseur'];
//         $libelleProduit = implode(", ", $_POST['libelleProduit']);
//         $referenceProduit = implode(", ", $_POST['referenceProduit']);
//         $prix_achat = implode(", ", $_POST['prix_achat']);
//         $quantite_achetes = implode(", ", $_POST['quantite_achetes']);

//         // Use a try-catch block to handle exceptions
//         try {
//             // Prepare the INSERT statement
//             $query = "INSERT INTO approvisionnements(numero,date_achat,idFournisseur,libelleProduit,referenceProduit,prix_achat,quantite_achetes)
//                     VALUES(:numero, :date_achat, :idFournisseur, :libelleProduit, :referenceProduit, :prix_achat, :quantite_achetes)";
//             $stmt = $db->prepare($query);

//             // Bind the values to the prepared statement
//             $stmt->bindValue(':numero', $numero);
//             $stmt->bindValue(':date_achat', $date_achat);
//             $stmt->bindValue(':idFournisseur', $idFournisseur);
//             $stmt->bindValue(':libelleProduit', $libelleProduit);
//             $stmt->bindValue(':referenceProduit', $referenceProduit);
//             $stmt->bindValue(':prix_achat', $prix_achat);
//             $stmt->bindValue(':quantite_achetes', $quantite_achetes);

//             // Execute the statement
//             $stmt->execute();

//             // Redirect to the approvisionnements page
//             header('Location: ./approvisionnements.php');
//             exit;
//         } catch (Exception $e) {
//             // Log the exception message
//             error_log($e->getMessage());
//             // Set an error message
//             $error_message = "There was an error processing the form. Please try again.";
//         }
//     }
// }




// Include the database connection file
include_once '../include/connexion.php';

// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Validate the form input
    if (empty($_POST['numero']) || empty($_POST['date_achat']) || empty($_POST['idFournisseur']) || empty($_POST['libelleProduit']) || empty($_POST['referenceProduit']) || empty($_POST['prix_achat']) || empty($_POST['quantite_achetes'])) {
        $error_message = "All fields are required";
    } else {
        // Store the form input in variables
        $numero = $_POST['numero'];
        $date_achat = $_POST['date_achat'];
        $idFournisseur = $_POST['idFournisseur'];
        $libelleProduit = $_POST['libelleProduit'];
        $referenceProduit = $_POST['referenceProduit'];
        $prix_achat = $_POST['prix_achat'];
        $quantite_achetes = $_POST['quantite_achetes'];

        // Use a try-catch block to handle exceptions
        try {
            for ($i = 0; $i < count($libelleProduit); $i++) {
                // Prepare the INSERT statement
                $query = "INSERT INTO approvisionnements(numero,date_achat,idFournisseur,libelleProduit,referenceProduit,prix_achat,quantite_achetes)
                        VALUES(:numero, :date_achat, :idFournisseur, :libelleProduit, :referenceProduit, :prix_achat, :quantite_achetes)";
                $stmt = $db->prepare($query);

                // Bind the values to the prepared statement
                $stmt->bindValue(':numero', $numero);
                $stmt->bindValue(':date_achat', $date_achat);
                $stmt->bindValue(':idFournisseur', $idFournisseur);
                $stmt->bindValue(':libelleProduit', $libelleProduit[$i]);
                $stmt->bindValue(':referenceProduit', $referenceProduit[$i]);
                $stmt->bindValue(':prix_achat', $prix_achat[$i]);
                $stmt->bindValue(':quantite_achetes', $quantite_achetes[$i]);

                // Execute the statement
                $stmt->execute();
            }

            // Redirect to the approvisionnements page
            header('Location: ./approvisionnements.php');
            exit;
        } catch (Exception $e) {
            // Log the exception message
            error_log($e->getMessage());
            // Set an error message
            $error_message = "There was an error processing the form. Please try again.";
        }
    }
}