<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    public function render()
    {
        //prendere tutti gli utenti
        $users = User::orderBy('updated_at','DESC')->paginate(15);

        return view('livewire.users.index',compact('users'));
    }


    public function delete(User $user){

        // Approccio 1 --> andiamo a rendere null lo user_id degli articoli dell'utente da eliminare
        // $articles = $user->articles;
        // foreach($articles as $article){
        //     $article->user_id=null;
        //     $article->save();
        // }

        // $user->delete();
        // session()->flash('success','User successfully deleted.');

        // Appoccio 2 --> impediamo l'eliminazione di Utenti con articoli associati
        if($user->articles->count>0){
            session()->flash('error','User cannot be deleted.');

        }else{
            $user->delete();
            session()->flash('success','User successfully deleted.');

        }


    }
}
