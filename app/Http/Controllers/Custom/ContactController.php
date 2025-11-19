<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Contactu;
use App\Models\Address;
use App\Models\Gmail;
use App\Models\Number;
use App\Models\Officetime;
use App\Models\Map;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('custom.contact', [
            "addresses"  => Address::all(),
            "gmails"     => Gmail::all(),
            "numbers"    => Number::all(),
            "officetime" => Officetime::first(),
            "map"    => Map::first(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"    => "required|string|max:255",
            "email"   => "required|email",
            "number"  => "required|string|max:20",
            "subject" => "required|string|max:255",
            "nessage" => "required|string",
        ]);

        Contactu::create([
            "name"    => $request->name,
            "email"   => $request->email,
            "number"  => $request->number,
            "subject" => $request->subject,
            "nessage" => $request->nessage, // Model ke field ke naam ke hisaab se
        ]);

        return back()->with("success", "Your message has been sent successfully!");
    }
}
