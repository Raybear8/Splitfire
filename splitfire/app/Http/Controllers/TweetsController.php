<?php


namespace App\Http\Controllers;

use App\Models\Tweets;
use App\Models\Tags;
use App\Models\Tweet_tags;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Validator;

class TweetsController extends Controller
{
//Function permettant la géneration aléatoire  de 2000 tweets avec des liaisions
    public function generation(){

        for($i=1; $i <=2000; $i++){
            $insert = Tweets::create(['auteur' => 'Auteur_'.rand(1, 20),
                'message'=>'Message '.$i]);
            $rand_memoire =[];
            for($j=1; $j <=rand(0,4); $j++) {
                $rand = rand(0, sizeof(Tags::all()));
                if(!in_array($rand, $rand_memoire)){
                    $insert->tags()->attach($rand);
                    $rand_memoire[]= $rand;
                }

            }
        }
        return view('welcome');
    }

    //Renvoi la vue pour créer un nouveau tweet et en récuperant tous les hashtags
    public function new()
    {
        $list_tag = Tags::all();
        return view('tweet.new', [
            'list_tag' => $list_tag
        ]);
    }

    //Renvoi la vue afficher "tous les tweets" , si on recupere les valeurs d'auteur , hashtag ou le nombre d'éléments à afficher par page, on filtre avec ces critéres
    public function list(Request $request)
    {
        //Récuperation des paramétres
        $auteur = $request->input('auteur');
        $tag = intval($request->input('tag'));

        //si la valeur est null on passe la valeur par défaut qui est 25
        $count = $request->input('count')!=null ? intval($request->input('count')) : 25;

        //Requete avec une jointure externe pour retourner tous les enregistrements de la table tweets même si la condition n'est pas vérifiée dans l'autre table
        $list = Tweets::leftJoin('tags_tweets', 'tags_tweets.tweets_id', '=', 'tweets.id')->where('auteur', 'like', "%$auteur%");

        //Si on choisit un tag, on ajoute le fitre pour avoir tous les tweets qui possédent ce tag
        if($tag!=0){
            $list->where('tags_tweets.tags_id', '=', $tag);
        }

        //On ne sélectionne que les champs de la table tweets et pour éviter les doublons du a la jointure on regroupe par l'id du tweet
        $list=$list->select('tweets.*')->groupby('tweets.id')->paginate($count);

        //On récupere la liste de tous les tags
        $list_tag = Tags::all();

        //On renvoie dans la vue de la liste des tweets des parametres pour remplir le tableau et les champs de saisie
        return view('tweet.list', [
            'list_tweet'=>$list,
            'list_tag' =>$list_tag,
            'input_auteur'=>$auteur,
            'input_count'=> $count
        ]);
    }

    //Fonction permettant de créer un nouveau tweet et la liaision avec ses tags
    public function insert(Request $request){

        $validate = $request->validate([
            'auteur' => 'required',
            'message' => 'required|max:1000'
        ]);

        $insert = Tweets::create(['auteur' => $request->input('auteur'),
            'message'=>$request->input('message')]);

        if ($request->input('tags') !=null){
            foreach ($request->input('tags') as $tag){
                $insert->tags()->attach($tag);
            }
        }

        return redirect((url('/tweets')));
    }
}
