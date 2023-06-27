<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Garbage;

class ChartController extends Controller
{
    public function index()
    {
        $assignedGarbages = Driver::select('assignedto')
            ->whereNotNull('assignedto')
            ->groupBy('assignedto')
            ->get()
            ->countBy('assignedto');

        $aboveGarbages = Garbage::where('level', '>', 75)
            ->get(['id', 'level']);

        $betweenGarbages = Garbage::where('level', '>', 40)
            ->where('level', '<=', 75)
            ->get(['id', 'level']);

        $belowGarbages = Garbage::where('level', '<=', 40)
            ->get(['id', 'level']);

        return view('chart', compact('assignedGarbages', 'aboveGarbages', 'betweenGarbages', 'belowGarbages'));
    }
}
