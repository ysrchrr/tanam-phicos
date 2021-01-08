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

            <?php foreach ($data_blog as $db) : ?>
                <div class="box padding">
                    <a href="blog-post.html"><img alt="blog" src="<?= $db['gambar_blog']; ?>"></a>
                    <h3><a href="<?= base_url(); ?>/blog/post/<?= $db['slug']; ?>"><?= $db['judul_blog']; ?></a></h3>
                    <div class="post-detail">
                        <b>Posted:</b> <?= $db['terakhir_diperbarui']; ?>;by<a href="#"> <?= $db['nama']; ?> </a>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="text-blog">
                        <?= substr($db['isi_blog'], 0, 400); ?>
                        <a href="<?= base_url(); ?>/blog/post/<?= $db['slug']; ?>"><em>..Read More</em></a>
                    </div>

                </div>
            <?php endforeach; ?>
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
    <div class="row">

        <div class="col-md-12">
            <?php
            if (!empty($pager)) {
                echo $pager->simpleLinks();
            }
            ?>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>