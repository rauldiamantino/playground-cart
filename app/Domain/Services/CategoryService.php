<?php

namespace App\Domain\Services;

use Illuminate\Support\Str;
use App\Domain\Models\Category;
use Exception;

class CategoryService
{
    public function create(array $data): Category
    {
        $data['slug'] = Str::slug($data['name']);

        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        if (isset($data['slug']) && $data['slug']) {
            $data['slug'] = Str::slug($data['slug']);
        }
        elseif (isset($data['name']) && $data['name'] !== $category->name) {
            $data['slug'] = Str::slug($data['name']);
        }

        return $category->update($data);
    }

    public function delete(Category $category): bool
    {
        if ($category->children()->exists()) {
            throw new Exception('Cannot delete category with subcategories');
        }

        if ($category->products()->exists()) {
            throw new Exception('Cannot delete category with products');
        }

        return $category->delete();
    }
}
