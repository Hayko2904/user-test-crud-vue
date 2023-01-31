<?php
declare(strict_types=1);

namespace Src\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Repositories\RepositoryInterface;

class UserController extends Controller
{
    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * OrderController constructor.
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json($this->repository->index($request->toArray()));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->toArray();
        $data['password'] = bcrypt($data['password']);
        $order = $this->repository->create($data);

        return response()->json($order);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json([
            'success' => $this->repository->delete($id)
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->toArray();
        $data['password'] = bcrypt($data['password']);
        return response()->json([
            'data' => $this->repository->update($data, $id)
        ]);
    }
}