<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider"></span></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>

    </div>



    <div class="row box mb-2">
        <div class="col-md-12 ">
            <h1 class="text-center">Untuk Konsultasi dan info lebih lanjut</h1>
        </div>
        <div class="row text-center">
            <div class="col-md-12"><a href="#"><img style="width: 300px;height: 300px;" src="<?= base_url(); ?>/front-assets/img/telegram-icon.png" alt=""></a></div>
        </div>
        <div class="row text-center">
            <div class="col-md-12"><a href="#"><img style="width: 250px;height: 250px;" src="<?= base_url(); ?>/front-assets/img/whatsapp-icon.png" alt=""></a></div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>