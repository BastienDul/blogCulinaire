<?php 
$titre = "Bienvenue sur le BlogCulinaire";
ob_start();
?>
<p class="text-center fs-1" >Une erreur est survenue : <?=$msgErreur?> </p>

<?php 
$contenu = ob_get_clean();
require('gabarit.php');
?>