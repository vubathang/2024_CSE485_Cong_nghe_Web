<?php
    include 'fakedata.php';
    displayView('components/header');
?>
<section class="w-100 text-center" style="height: 500px;">
    <img src="./assets/images/banner.jpg" alt="" style="object-fit: cover; height: 500px; width: 100%; object-position: 0 -400px;">
</section>
<div class="container">
    <?php displayView('home/navbar'); ?>
    <!-- <?php displayView('home/introduce'); ?> -->
    <?php displayView('home/news-events', [
        'news' => $news
    ]); ?>
    <?php displayView('home/contact'); ?>
</div>
<?php
    displayView('components/footer')    
?>