<?php
const BR = '<br> <br> <br>';

echo 'Hello Donkey! <br>';
$bookName_str = "Voyage avec un âne dans les Cévennes";
$bookRead_bool = FALSE;
$bookPublishedYear_int = 2017; 
$bookFnacPaperbackPrice_float = 28.02;

echo 'Titre du livre : ', $bookName_str, '<br>';
echo 'Livre lu : ', $bookRead_bool ? 'oui' : 'non', '<br>';
echo 'Livre publié en : ', $bookPublishedYear_int, '<br>';
echo 'Prix de l\'édition brochée : ', $bookFnacPaperbackPrice_float, '€', '<br>';

echo BR;

function decodeMessage ($message_str)
{
    echo strrev(str_replace("@#?", " ", mb_substr($message_str, 5, round(mb_strlen($message_str)/2)))), '<br>';
}

decodeMessage("0@sn9sirppa@#?ia'jgtvryko");
decodeMessage("q8e?wsellecif@#?sel@#?setuotpazdsy0*b9+mw@x1vj");
decodeMessage("aopi?sgnirts@#?sedhtg+p9l!");

echo BR;

$biblio_array = [
    'Treasure Island' => 1883,
    'The Wrong Box'=> 1889,
    'The Strange Case of Dr. Jekyll and Mister Hyde'=> 1886
];

asort($biblio_array);

foreach ($biblio_array as $title => $year){
    echo $year, ' - ', $title, '<br>';
}

echo BR;

$filmo_array = [
    'Muppet Treasure Island' => ['Tim Curry', 'Billy Connolly', 'Jennifer Saunders'],
    'Treasure Island' => ['Charlton Heston', 'Christian Bale', 'Oliver Reed'],
    'I Monster' => ['Christopher Lee', 'Peter Cushing', 'Mike Raven'],
    'Dr. Jekyll and Mr. Hyde' => ['Spencer Tracy', 'Ingrid Bergman', 'Lana Turner']
];

foreach ($filmo_array as $movieTitle_str => $movieTitle_array) {
    echo 'Dans le film ', $movieTitle_str, 'les principaux acteurs sont :';
    foreach ($movieTitle_array as $actorName_str) {
        echo ' ', $actorName_str;
    }
    echo '.<br>';
}

echo BR;

foreach ($filmo_array as $movieTitle_str => $movieTitle_array) {
    echo 'Dans le film ', $movieTitle_str, 'les principaux acteurs sont :';
    $actorName_str = implode(", ", $movieTitle_array);
    echo ' ', $actorName_str;
    echo '.<br>';
}

echo BR;

$weapons = ['fists', 'whip', 'gun'];
$opponentWeapon = $weapons[rand(0,2)]; // Cela permet de choisir une arme de manière aléatoire.

echo 'Your opponent draws his ', $opponentWeapon, ',<br>';
if ('fists' == $opponentWeapon) {
    $stevensonWeapon = 'gun';
} elseif ('whip' == $opponentWeapon) {
    $stevensonWeapon = 'fists';
} else {
    $stevensonWeapon = 'whip';
}

echo 'You win this duel with your ', $stevensonWeapon, '.';

echo BR;

function writeSecretSentence (string $param1_str, string $param2_str) : string
{
    return $param1_str . ' s’incline face à ' . $param2_str;
}

echo writeSecretSentence('Aloïs', 'Vulcain, dieu du (heavy) metal &#x1F918');