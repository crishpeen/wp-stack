<?php get_header(); ?>
<?php the_title(); ?>
<?php $transportSeed = new TransportSeed();?>

    <section class="section section--dense">
        <div class="container container--narrow">
            <h1 class="offset-bottom--none">Tudy cesta nevede ⛔</h1>
        </div>
    </section>
    <section class="section section--dense transport-wrap transport-wrap--narrow transport-wrap--spacy">
        <div class="transport-left">
            <?php for ($x = 0; $x <= 50; $x++) : ?>
                <span class="transport transport--offset-<?=rand(0, 5);?> transport--<?=$transportSeed->get();?> js-transport"></span>
            <?php endfor; ?>
        </div>
        <div class="transport-right">
            <?php for ($x = 0; $x <= 50; $x++) : ?>
                <span class="transport transport--offset-<?=rand(0, 5);?> transport--<?=$transportSeed->get();?> js-transport"></span>
            <?php endfor; ?>
        </div>
        <div class="container container--narrow">
            <div class="wp-article">
                <p>
                    Pionýři mají prozkoumávat nová místa – bohužel toto je tak neznámé, že ani neexistuje na našem webu.
                </p>
                <p>
                    Zkuste se vrátit <a href="<?=get_home_url();?>">na hlavní stránku</a>, a pokud myslíte, že jsme něco zvrtali
                    a tato stránka by měla existovat, prosíme, <a href="<?=get_home_url(null, 'tym');?>">dejte nám o tom vědět</a>.
                </p>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
