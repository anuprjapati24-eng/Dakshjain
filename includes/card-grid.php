<?php
defined('SITE_ROOT') || exit;
/**
 * Numbered grid of topic cards (same treatment as "Areas of Work" on the homepage).
 * Expects $cards: list of ['icon' => 'bi-…', 'title' => '…', 'text' => '…'].
 */
?>
<ul class="areas reveal">
    <?php foreach ($cards as $i => $card): ?>
        <li class="areas__item">
            <div class="areas__meta">
                <span class="areas__number"><?= sprintf('%02d', $i + 1) ?></span>
                <i class="bi <?= e($card['icon']) ?>" aria-hidden="true"></i>
            </div>
            <h3 class="areas__title"><?= e($card['title']) ?></h3>
            <p><?= e($card['text']) ?></p>
        </li>
    <?php endforeach; ?>
</ul>
