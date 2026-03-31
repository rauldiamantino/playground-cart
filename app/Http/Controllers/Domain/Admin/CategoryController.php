<?php

namespace App\Http\Controllers\Domain\Admin;

use App\Domain\Enums\CategoryStatus;
use App\Domain\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Domain\Admin\StoreCategoryRequest;
use App\Http\Requests\Domain\Admin\UpdateCategoryRequest;
use App\Domain\Services\CategoryService;
use Exception;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService,
    ) {}

    public function index(): View
    {
        $categories = Category::with('parent')
            ->orderBy('name')
            ->paginate(10);

        return view('domain.admin.categories.index', compact('categories'));
    }

    public function create(): View
    {
        $parentCategories = Category::whereNull('parent_id')->get();

        $statuses = CategoryStatus::cases();

        return view('domain.admin.categories.create', compact('parentCategories', 'statuses'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = $this->categoryService->create($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category ' . $category->name . ' created');
    }

    public function edit(Category $category): View
    {
        $parentCategories = Category::where('id', '!=', $category->id)
            ->whereNull('parent_id')
            ->get();

        $statuses = CategoryStatus::cases();

        return view('domain.admin.categories.edit', compact('category', 'parentCategories', 'statuses'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $this->categoryService->update($category, $validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated');
    }

    public function destroy(Category $category)
    {
        try {
            $this->categoryService->delete($category);

            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Category deleted');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
