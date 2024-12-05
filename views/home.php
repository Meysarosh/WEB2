<?php
$title = 'Főoldal - Utazási Iroda'; 
?>

<div class="container mt-4">
    <header class="text-center">
        <h1 class="display-4">Üdvözöljük az Utazási Irodában!</h1>
        <p class="lead">Fedezze fel a világ legcsodálatosabb úti céljait velünk!</p>
        <a href="index.php?page=register" class="btn btn-primary btn-lg mt-3">Csatlakozzon hozzánk most!</a>
    </header>

    <section class="mt-5">
        <h2 class="text-center">Legnépszerűbb úti céljaink</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo SITE_ROOT; ?>assets/maldives.jpg" class="card-img-top" alt="Tengerpart">
                    <div class="card-body">
                        <h5 class="card-title">Maldív-szigetek</h5>
                        <p class="card-text">Élvezze a fehér homokot, a kristálytiszta vizet és a nyugalmat!</p>
                        <a href="#" class="btn btn-outline-primary">Részletek</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo SITE_ROOT; ?>assets/alps.jpg" class="card-img-top" alt="Hegyek">
                    <div class="card-body">
                        <h5 class="card-title">Alpok</h5>
                        <p class="card-text">Hegyi túrák, síelés és lenyűgöző panoráma várja Önt!</p>
                        <a href="#" class="btn btn-outline-primary">Részletek</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo SITE_ROOT; ?>assets/paris.jpg" class="card-img-top" alt="Városnézés">
                    <div class="card-body">
                        <h5 class="card-title">Párizs</h5>
                        <p class="card-text">Fedezze fel a szerelem városát, az Eiffel-toronytól a Louvre-ig!</p>
                        <a href="#" class="btn btn-outline-primary">Részletek</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <h2 class="text-center">Miért válasszon minket?</h2>
        <div class="row mt-4 text-center">
            <div class="col-md-4">
                <i class="bi bi-globe fs-1 text-primary"></i>
                <h5 class="mt-3">Világszerte Úti Célok</h5>
                <p>Széles választékot kínálunk a világ minden tájáról.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-wallet2 fs-1 text-primary"></i>
                <h5 class="mt-3">Elérhető Árak</h5>
                <p>Versenyképes áraink garantálják a legjobb ajánlatokat.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-person-check fs-1 text-primary"></i>
                <h5 class="mt-3">Ügyfélközpontúság</h5>
                <p>Az Ön elégedettsége a legfontosabb számunkra.</p>
            </div>
        </div>
    </section>

</div>
