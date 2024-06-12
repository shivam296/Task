<?php

namespace App\Http\Controllers;

use App\Models\CronJob;
use Illuminate\Http\Request;
use App\Rules\CronExpression; 

class CronJobController extends Controller
{
     public function index()
    {
        $cronJobs = CronJob::all();
        return view('cron-jobs.index', compact('cronJobs'));
    }

    public function create()
    {
        return view('cron-jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'frequency' => ['required', 'string', 'max:255', new CronExpression],
        ]);

        CronJob::create($request->all());
        return redirect()->route('cron-jobs.index');
    }

    public function destroy(CronJob $cronJob)
    {
        $cronJob->delete();
        return redirect()->route('cron-jobs.index');
    }
}
