<?php


$context          = Timber::context();


$image_search = get_field('search');
$image_per_page = get_field('per_page') ?: 5;
$image_orientation = get_field('orientation') ?: 'landscape';

$unsplash = new GetImagesApi('kmjQoGqpNPGuLvuMLElS5Oj5hCO0D1AtNkK-MjyMJmY', 'YajJ8GsvrRDpRVbi5a6RAKLZjYj7ISiqkafsz4ShJgE', 'http://test', 'AppNew');
$images = $unsplash->getImages($image_search, 1, $image_per_page, $image_orientation);

$context['images_title'] = get_field('block_title');
$context['images_description'] = get_field('block_description');
$context['images'] = $images;

Timber::render('chunks/images.twig', $context);
