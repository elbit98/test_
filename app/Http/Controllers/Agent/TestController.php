<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\AgentController;
use App\Models\SphereMask;
use App\Services\TestService;
use Validator;
use App\Models\Sphere;
use Datatables;

class TestController extends AgentController
{

    private $service;

    public function __construct(TestService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->user->leads()
            ->has('openLeads')
            ->with('phone')
            ->get();

        return view('agent.test.index', compact('data'));
    }


    /**
     * @param $sphere_id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAdditionalData($sphere_id)
    {

        $data = Sphere::findOrFail($sphere_id);
        $data->load('attributes.options', 'leadAttr.options',
            'leadAttr.validators');
        $mask = new SphereMask($data->id, $this->user->id);
        $mask = $mask->findMask()->first();

        $options = $this->service->getOptions($data, $mask);

        return response()->json($options);

    }


}
