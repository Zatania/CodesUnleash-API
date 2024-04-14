<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Http\Requests\Badge\{
    CreateBadgeRequest,
    DeleteBadgeRequest,
    IndexBadgeRequest,
    ShowBadgeRequest,
    UpdateBadgeRequest
};

use App\Repositories\Badge\{
    CreateBadgeRepository,
    DeleteBadgeRepository,
    IndexBadgeRepository,
    ShowBadgeRepository,
    UpdateBadgeRepository
};
use App\Models\Badge;

class BadgeController extends Controller
{
    protected $index, $create, $show, $update, $delete;

    public function __construct(
        IndexBadgeRepository $index,
        CreateBadgeRepository $create,
        ShowBadgeRepository $show,
        UpdateBadgeRepository $update,
        DeleteBadgeRepository $delete
    ) {
        $this->index = $index;
        $this->create = $create;
        $this->show = $show;
        $this->update = $update;
        $this->delete = $delete;
    }

    public function index(IndexBadgeRequest $request)
    {
        return $this->index->execute();
    }

    public function create(CreateBadgeRequest $request)
    {
        return $this->create->execute($request);
    }

    public function show(ShowBadgeRequest $request, $referenceNumber)
    {
        return $this->show->execute($referenceNumber);
    }

    public function update(UpdateBadgeRequest $request, $referenceNumber)
    {
        return $this->update->execute($request, $referenceNumber);
    }

    public function delete(DeleteBadgeRequest $request, $referenceNumber)
    {
        return $this->delete->execute($referenceNumber);
    }
    
    public function uploadBadgeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        return $imagePath;
    }
}
