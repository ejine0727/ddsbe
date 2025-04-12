<?php

namespace App\Http\Controllers;

use App\Models\UserJob; // Your model
use Illuminate\Http\Request; // For handling HTTP requests
use App\Traits\ApiResponser; // Custom trait for standardized responses
use Illuminate\Http\Response;
use App\Models\User;

class UserJobController extends Controller
{
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Return the list of user jobs
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userjobs = UserJob::all();
        return $this->successResponse($userjobs);
    }

    public function store(Request $request)
    {
    $rules = [
        'username' => 'required',
        'password' => 'required',
        'gender' => 'required',
        'jobid' => 'required|integer',
    ];

    $this->validate($request, $rules);

    $userjob = UserJob::create($request->all());

    return $this->successResponse($userjob, 201);
    }


    // Update a UserJob
    public function update(Request $request, $id)
    {
        $rules = [
            'jobname'  => 'max:100',
            'username' => 'max:50',
            'password' => 'max:50',
            'gender'   => 'in:Male,Female',
        ];

        $this->validate($request, $rules);

        $userjob = UserJob::findOrFail($id);
        $userjob->fill($request->all());

        if ($userjob->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userjob->save();
        return $this->successResponse($userjob);
    }

    /**
     * Get one user job by ID
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userjob = UserJob::findOrFail($id);
        return $this->successResponse($userjob);
    }

    public function destroy($id)
    {
        $userjob = UserJob::findOrFail($id);
        $userjob->delete();

        return $this->successResponse("UserJob with ID $id has been deleted.");
    }
}
