<?php

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" type=text/css>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Hind+Madurai:wght@300;400;500;600;700&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<title>sandrine coupart nutritionniste diététicienne</title>
</head>
<header>
 <?php 
 require_once "header.php"
 ?>
</header>
<main></main>
<footer></footer>
<body>
  <h1>SANDRINE, DIÉTÉTICIENNE NUTRITIONNISTE</h1>

    <h2>Qui suis-je?</h2>
    <P>Diététicienne-nutritionniste diplômée de l’Institut de Commerce et de Gestion de l’Enseignement Supérieur (Paris). 
      Ma vocation est d’accompagner des personnes motivées à retrouver une relation saine avec la nourriture healthy, afin de leur permettre d’atteindre leur objectif et se sentir mieux dans leur peau. Sportive et passionnée de ce milieu, du bien-être et de l’accompagnement personnel, mon activité se base principalement sur l’éducation nutritionnelle, et l’accompagnement personnel.</p>
    <p> Atteignez votre objectif de façon saine et durable, juste en rééquilibrant votre alimentation, avec plaisir et sans restriction alimentaire !<p></p>
    <p>QU’EST-CE QU’UNE CONSULTATION DIÉTÉTIQUE ?
La haute autorité de santé définie la consultation diététique comme un ensemble d’actes de soins qui se déroule entre une diététicienne nutritionniste et la personne soignée (accompagnée ou non de son entourage). La consultation diététique est réalisée suite à une prescription médicale ou à la demande en direct d’un particulier. Elle comprend : un bilan diététique, la mise en place d’une stratégie, la mise en place d’objectifs de soin diététique et le suivi nutritionnel à but éducatif, préventif ou thérapeutique. C’est
une activité de collaboration avec les médecins et les autres professionnels de santé.</p>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="scrit.js"></script>
</body>
</html>
