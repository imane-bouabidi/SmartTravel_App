

<?php
ob_start();
?>

<header id="header">
<img class="mt-5" 
src="assets/imgs/header-illustration-2.png"
alt="travel"
width="650">
</header>



<div class="d-flex justify-content-center align-items-center">
<form action="index.php?action=search" method="post"
id="booking" 
class="container rounded-5 row g-3 needs-validation p-4 mt-3 border border-black" novalidate>
  <div class="col-md-3">
    <div class="form-outline" data-mdb-input-init>
      <label for="validationCustom02" class="form-label">Departure city</label>
      <select name="vDepart" class="form-control" data-mdb-select-init data-mdb-filter="true">
        <?php foreach($villesDATA as $ville) { ?>    
          <option value="<?= $ville->getIdVille(); ?>">
              <?php echo $ville->getVille_name(); ?>
          </option>
        <?php } ?>
      </select> 
      </div>
  </div>
  <div class="col-md-3">
    <div class="form-outline" data-mdb-input-init>
      <label for="validationCustom02" class="form-label">Destination city</label>
      <select name="vArrivee" class="form-control" data-mdb-select-init data-mdb-filter="true">
        <?php foreach($villesDATA as $ville) { ?>    
          <option value="<?= $ville->getIdVille(); ?>">
              <?php echo $ville->getVille_name(); ?>
          </option>
        <?php } ?>
      </select> 
      </div>
  </div>
  <div class="col-md-3">
    <div class="form-outline" data-mdb-input-init>
    <label for="Date" class="form-label">Date</label>
    <input name="date" type="date" class="form-control" id="validationCustom01" value="Mark" required>
  </div>
</div>
<div class="col-md-3">
  <div class="form-outline" data-mdb-input-init>
    <label for="validationNumCustom" class="form-label">Number Of Passengers</label>
    <input name="NumCustom" type="number" class="form-control" id="validationCustom01" value="1" required>
      </div>
  </div>
  <div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-outline-light btn-rounded mt-3" data-mdb-ripple-init  data-mdb-ripple-color="dark">Search</button>
  </div>
</form>
</div>
<div id="searchResults" class="mt-6">
    <?php if(isset($horaireDATA) && !empty($horaireDATA)) : ?>
        <h2 class=" w-80 mx-auto text-2xl font-bold mb-4">Bus Disponibles :</h2>
        <div class="w-80 mx-auto">
            <?php foreach ($horaireDATA as $Horaire) : ?>
                <div class="flex p-4 bg-white shadow-md rounded-md mb-4">
                    <div class="flex-1">
                        <p class="text-lg font-semibold mb-2">ID Bus: <?= $Horaire->getIdBus(); ?></p>
                        <p class="text-gray-600 mb-2">Heure de départ: <?= $Horaire->getHeureDepart(); ?></p>
                        <p class="text-gray-600">Heure d'arrivée: <?= $Horaire->getHeureArrivee(); ?></p>
                    </div>
                    <!-- Ajoutez d'autres informations du bus ici si nécessaire -->
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p class="text-gray-600">Aucun résultat trouvé pour la recherche.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

<?php
$content = ob_get_clean();
include_once 'layout.php';
?>