<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index() {
    $members = [
            'Nurul Annissa Azzahra','Budi','Citra','Dewi','Eko'];

    return view('members.index', compact('members'));
    }
}
