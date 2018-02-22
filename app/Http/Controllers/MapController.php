<?php

namespace App\Http\Controllers;

use App\Repositories\MapRepository;
use Illuminate\Http\Request;

class MapController extends Controller
{
    protected $repository;

    public function __construct(MapRepository $repository)
    {
        $this->repository = $repository;
    }

    public function mapHandler(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'file' => 'required|max:5120',
            ]);

            $result = $this->repository->Handle($request);

            dd($result);

        }


//        dd('-----------map----------------');
        return view('map.show')->render();
    }
}
