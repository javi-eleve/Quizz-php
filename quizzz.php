<?php

echo "Pour commencer le jeux, Tapez votre prenom \n";
$joueur = trim(fgets(STDIN));
$score =0;
echo "\n";

do{
    $fichier = 'joueurs.text';

    if(file_exists($fichier)==true){

        $joueurslist=file("joueurs.text",FILE_IGNORE_NEW_LINES);
    
        for ($i = 0; $i <count($joueurslist); $i++) {
    
            $list = $joueurslist[$i];
    
            list($prenom, $score1) = explode(":", $list);
            
            if($prenom==$joueur){              
                
                echo "###################################################\n";
                echo "Bienvenue encore $joueur ton meilleur score est: $score1!\n";
                echo "###################################################\n";
                break;
            }
        }
        
    }

    
    $score =0;
    echo "\n";
    
    echo "###################################################\n";
    echo "######## Qui veux gagner des millions ?! ##########\n";
    echo "###################################################\n";
    echo "\n";
    echo "###################################################\n";
    echo "Joueur : $joueur  Score : $score\n";
    echo "###################################################\n";
    
    echo "\n";

    $questions = [
        "Qu'elle est la couleur du chaval blanc d'Henri IV ?\n1. Noir\n2. Blanc\n3. Rouge\n",
        "Prise de la Bastille ?\n1. 1789\n2. 1750\n3. 1800\n",
        "Quel monument parisien est l'un des symboles les plus connus de la France ?\n1. L'Acropole d'Athènes\n2. La Tour Eiffel\n3. Le Colisée de Rome\n",
        "Quelle fête nationale française célèbre la prise de la Bastille et la Révolution ?\n1. Le 8 mai (Victoire 1945)\n2. Le 11 novembre (Armistice 1918)\n3. Le 14 juillet (Fête Nationale)\n",
        "Quel est le fleuve qui traverse la ville de Paris ?\n1. Le Rhin\n2 La Seine\n3. La Loire\n",
        "Quel fromage français, connu pour son odeur forte, est souvent appelé le roi des fromages ?\n1. Le Brie\n2. Le Roquefort\n3. Le Comté\n",
        "Dans quelle région française se trouve le Mont-Saint-Michel ?\n1. En Normandie\n2. En Bretagne\n3. Dans les Alpes\n",
        "Quel écrivain français a écrit Les Misérables et Notre-Dame de Paris ?\n1. Gustave Flaubert\n2. Albert Camus\n3. Victor Hugo\n",
        "Quelle est la spécialité culinaire traditionnelle de la région de la Provence, à base de légumes ?\n1. La Choucroute\n2. La Ratatouille\n3. Le Cassoulet\n",
        "Quelle célèbre course cycliste traverse la France chaque été ?\n1. Le Paris-Roubaix\n2. Le Tour de France\n3. La Vuelta a España\n"

    ];

    $reponses = [
   "2",
   "1",
   "2",
   "3",
   "2",
   "2",
   "1",
   "3",
   "2",
   "2"


    ];
    $bonnereponse =0;
    for($i=0;$i<count($questions);$i++){

        echo "$questions[$i]\n";
        echo "Tapez le numero de votre reponse!\n";
        echo "\n";
    
        $reponse = trim(fgets(STDIN));
        echo "\n";
        if($reponse==$reponses[$i]){
            echo "Bravo $joueur!\n";
            $score+=10;
            echo "\n";
            $bonnereponse++;
            echo "###################################################\n";
            echo "Score : $score\n";
            echo "###################################################\n";
        }else{
            echo "Presque!\n";
            echo "###################################################\n";
            echo "score=$score\n";
            echo "###################################################\n";
        }

            echo "\n";
    

    }

    echo "########### GAME OVER ###########\n";

    if(($bonnereponse*10)>=50){
    echo "Vous avez Gagne avec " . ($bonnereponse*10) . "% de boones reponses\n";
    }else{
    echo "vous avez Perdu\n";
    }
    
    $regist=[];
    $nouveaujoueur=true;
    if(file_exists($fichier)){
        $joueurslist=file("joueurs.text",FILE_IGNORE_NEW_LINES);
        
        for ($i = 0; $i < count($joueurslist); $i++) {
    
                $list = $joueurslist[$i];
    
                list($prenom, $score1) = explode(":", $list);

                if($prenom==$joueur){

                    $nouveaujoueur=false;

                    if($score1<$score){
                
                        $score1=$score;
                        $joueurslist[$i]="$joueur:$score1";
                        file_put_contents("joueurs.text", implode(PHP_EOL, $joueurslist)."\n");
                        break;
                    }
                }
        }

    }
    if($nouveaujoueur){
        $regist[]="$joueur:$score";
        $joueurslist=fopen("joueurs.text","a+");
        fwrite($joueurslist,implode(PHP_EOL, $regist)."\n");
        fclose($joueurslist);
    }
    echo "Voulez vous rejouer?(oui/non)\n";
     $rejouer =trim(fgets(STDIN));
            
}while($rejouer=="oui");
            
            
            
        