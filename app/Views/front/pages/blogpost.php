<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-title">Blog</h2>
        </div>
    </div>

    <div class="row content-blog">
        <div class="col-md-8">

            <div class="blog-post box padding">
                <img src="<?= $data_blog['gambar_blog']; ?>" alt="Image">
                <h3><a href="#"><?= $data_blog['judul_blog']; ?></a></h3>
                <div class="post-detail">
                    <b>Posted:</b> <?= $data_blog['terakhir_diperbarui']; ?> &nbsp;by<a href="#"> <?= $data_blog['nama']; ?> </a>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="text-blog">
                    <?= $data_blog['isi_blog']; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4  box padding">
            <div class="col-post">
                <h3>Quotes All of Time</h3>
                <p style="font-style: italic;">"Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma – which is living with the results of other people's thinking." -Steve Jobs</p>
            </div>

            <div class="col-post">
                <h3>Archives</h3>
                <ul class="post-menu">
                    <?php foreach ($archive as $a) : ?>
                        <li><a title="<?= $a['tanggal']; ?>" href="<?= base_url(); ?>/blog/archive/<?= implode('/', explode(' ', $a['tanggal'])); ?>"><?= $a['tanggal']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-post">
                <h3>Recent Posts</h3>
                <ul class="post-menu">
                    <?php foreach ($recent as $a) : ?>
                        <li><a title="<?= $a['judul_blog']; ?>" href="<?= base_url(); ?>/blog/post/<?= $a['slug']; ?>"><?= $a['judul_blog']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>