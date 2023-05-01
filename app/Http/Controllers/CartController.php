<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Score;
use App\Models\GiftCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index() {
		return Inertia::render('Cart/Main');
	}

    public function store(Request $request) {
        $user = User::with('score')->find(Auth::id());
        $giftcards = GiftCard::whereNull('user_id')->limit($request->qty)->get();

        $total = 10 * intval($request->qty);

        if (count($giftcards) < intval($request->qty)) {
            return redirect()->back()->withErrors('Parece que nos quedamos sin tarjetas de regalos. Por favor comunicate con nosotros.');
        }

        if(!$user->score || intval($user->score->score) < $total) {
            return redirect()->back()->withErrors('No tienes puntos suficientes para Canjear');
        }

        Score::where('user_id', $user->id)->decrement('score', $total);

        foreach ($giftcards as $giftcard) {
            $data[] = [
                'username' => $giftcard->username,
                'password' => $giftcard->password,
            ];

            $giftcard->user_id = $user->id;
            $giftcard->delivery_date = Carbon::now();
            $giftcard->save();
        }

        $this->sendMail($data);

        return redirect()->back()->with('message','success');
    }


    public function sendMail($data) {
        $user = User::with('score')->find(Auth::id());

        $from = config('mail.from.address');
        $to = $user->email;

        try {
            Mail::send('giftcard_mail', [
                'data' => $data
            ], function($message) use ($from, $to){
                $message->from($from);
                $message->to($to)->subject('Aquí tienes tu tarjeta de Canal ESTEVE Farmacias.');
            });

            return true;
        } catch (\Throwable $th) {
            Log::info(['email error: ',$th]);
            return false;
        }
    }
}
