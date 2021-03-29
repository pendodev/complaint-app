<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ComplaintController extends Controller
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function index()
    {
        return datatables()->of(Complaint::query())->toJson();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'date'        => ['required', 'date'],
            'client_name' => ['required', 'min:1'],
            'type'        => ['required', Rule::in(Complaint::TYPES)],
            'person'      => ['required', Rule::in(Complaint::PERSONS)],
            'job_title'   => ['required', Rule::in(Complaint::JOBS)],
            'complainant' => ['required', 'min:1'],
            'complaint'   => ['required', 'min:1'],
        ]);

        return Complaint::create(array_merge($request->all(), [
            'user_id' => Auth::user()->getKey()
        ]));
    }
}
