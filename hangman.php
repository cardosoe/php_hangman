<?php

function clear(){
    if (PHP_OS === "WINNT"){
        system("cls");
    }else{
        system("clear");
    }
}

$possible_words = ["Bulbasaur","Ivysaur","Venusaur","Charmander","Charmeleon","Charizard","Squirtle","Wartortle","Blastoise","Caterpie","Metapod","Butterfree","Weedle","Kakuna","Beedrill","Pidgey","Pidgeotto","Pidgeot","Rattata","Raticate","Spearow","Fearow","Ekans","Arbok","Pikachu","Raichu","Sandshrew","Sandslash","Nidoran","Nidorina","Nidoqueen","Nidoran","Nidorino","Nidoking","Clefairy","Clefable","Vulpix","Ninetales","Jigglypuff","Wigglytuff","Zubat","Golbat","Oddish","Gloom","Vileplume","Paras","Parasect","Venonat","Venomoth","Diglett","Dugtrio","Meowth","Persian","Psyduck","Golduck","Mankey","Primeape","Growlithe","Arcanine","Poliwag","Poliwhirl","Poliwrath","Abra","Kadabra","Alakazam","Machop","Machoke","Machamp","Bellsprout","Weepinbell","Victreebel","Tentacool","Tentacruel","Geodude","Graveler","Golem","Ponyta","Rapidash","Slowpoke","Slowbro","Magnemite","Magneton","Farfetch'd","Doduo","Dodrio","Seel","Dewgong","Grimer","Muk","Shellder","Cloyster","Gastly","Haunter","Gengar","Onix","Drowzee","Hypno","Krabby","Kingler","Voltorb","Electrode","Exeggcute","Exeggutor","Cubone","Marowak","Hitmonlee","Hitmonchan","Lickitung","Koffing","Weezing","Rhyhorn","Rhydon","Chansey","Tangela","Kangaskhan","Horsea","Seadra","Goldeen","Seaking","Staryu","Starmie","Mr. Mime","Scyther","Jynx","Electabuzz","Magmar","Pinsir","Tauros","Magikarp","Gyarados","Lapras","Ditto","Eevee","Vaporeon","Jolteon","Flareon","Porygon","Omanyte","Omastar","Kabuto","Kabutops","Aerodactyl","Snorlax","Articuno","Zapdos","Moltres","Dratini","Dragonair","Dragonite","Mewtwo","Mew"];

define("MAX_ATTEMPS", 6);

echo "Pokemon Hangman! \n\n";

$choosen_word = $possible_words[rand(0,7)];
$choosen_word = strtolower($choosen_word);
$word_lenght = strlen($choosen_word);
$discovered_letters = str_pad("", $word_lenght, "_");
$attempts = 0;

do {

echo "$word_lenght letters word \n\n";
echo $discovered_letters . "\n\n";

//Ask the player to type a letter

$player_letter = readline("Type a letter: ");
$player_letter = strtolower($player_letter);

if ( str_contains($choosen_word, $player_letter) ) {
   //we need to verify how many time the letter appears, until strpos returns false
    $offset = 0;
    while(
        ($letter_position = strpos($choosen_word, $player_letter, $offset)) !== false ){
        $discovered_letters[$letter_position] = $player_letter;
        $offset = $letter_position + 1;
    }
    }
    else {
        clear();
        $attempts++;
        echo "letter not found! " . (MAX_ATTEMPS - $attempts) . " attempts left.";
        sleep(1); //set the time frame the message is showed to the player
          }

        clear();

    } while( $attempts < MAX_ATTEMPS && $discovered_letters != $choosen_word );

        clear();
if ($attempts < MAX_ATTEMPS)
    echo "Congratulations! \n\n";
else
    echo "Try Again, buddy! \n\n";

echo "The choosen word is: $choosen_word\n";
echo "You discovered $discovered_letters";

echo "\n";
