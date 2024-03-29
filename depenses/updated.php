<?php

include "../partials/header.php";

require_once "../includes/db.php";

if(isset($_GET['id'])) {
$query = $bdd->query("SELECT * FROM depenses WHERE id=".$_GET['id']);
$depenses = $query->fetch(PDO::FETCH_OBJ);
} else {

    header('Location: index.php');
    exit;

}

?>

<main class="container">

    <h1>Depenses</h1>

    <h2> <?php echo $titre ?> </h2>

    <?php

    if(isset($message)) { ?>
        <p data-notice="<?php echo $message_type ?>">
            <span><?php echo $message_type ?></span>
            <i data-feather="x" data-close></i>
        </p>
    <?php } ?>

    <form action="create.php" method="POST">


        <label for="title"> Titre </label>
        <input value="<?= $depenses->titre ?>" type="text" id="titre"  name="titre">

        <label for="price"> Montant </label>
        <input value="<?= $depenses->montant ?>" type="number" id="montant"  name="montant">

        <label for="categorie"> Categorie </label>

        <input value="<?= $depenses->categorie ?>" type="radio" id="categorie" name="categorie" value="viequotidienne" />
        <label for="categorie"> Vie quotidienne </label>

        <input value="<?= $depenses->categorie ?>" type="radio" id="categorie" name="categorie" value="loisirs" />
        <label for="categorie"> Loisirs </label>

        <input value="<?= $depenses->categorie ?>" type="radio" id="categorie" name="categorie" value="voyages" />
        <label for="categorie"> Voyages/Transports </label>

        <input value="<?= $depenses->categorie ?>" type="radio" id="categorie" name="categorie" value="autresdepenses" />
        <label for="categorie"> Autres depenses </label>

        <br>
        <br>


        <label for="date"> Date </label>
        <input type="datetime-local" id="date"  name="date">

        <button>Envoyer</button>


    </form>

</main>


<?php

require '../partials/footer.php' ?>

