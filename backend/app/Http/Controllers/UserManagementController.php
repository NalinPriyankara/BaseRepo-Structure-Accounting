<?php

namespace App\Http\Controllers;

use App\Repositories\All\UserManagement\UserManagementInterface;
use App\Http\Requests\UserManagementRequest;
use Illuminate\Http\JsonResponse;

class UserManagementController extends Controller
{
    private UserManagementInterface $userRepo;

    public function __construct(UserManagementInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->userRepo->all());
    }

    public function store(UserManagementRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

         if ($request->hasFile('image')) {
            // store under storage/app/public/profile_images
            $path = $request->file('image')->store('profile_images', 'public');
            $data['image'] = $path; // e.g. "profile_images/nilupul.jpg"
        }


        $user = $this->userRepo->create($data);
        return response()->json($user, 201);
    }

    public function show(int $id): JsonResponse
    {
        $user = $this->userRepo->find($id);
        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user->image) {
            $user->image_url = asset('storage/' . $user->image);
        }
        
        return response()->json($user);
    }

    public function update(UserManagementRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $updated = $this->userRepo->update($id, $data);
        if (! $updated) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['message' => 'Updated successfully']);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->userRepo->delete($id);
        if (! $deleted) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['message' => 'User deleted']);
    }
}
