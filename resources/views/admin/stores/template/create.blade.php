<x-layouts title="Create Template">

<form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    
        <!-- Description in English -->
        <div class="form-group mb-3">
            <label for="desc_en">Description (English):</label>
            <input type="text" class="form-control" id="desc_en" name="desc_en" value="{{ old('desc_en') }}" required>
            @error('desc_en')
            <x-alert type="danger" :message="$message"></x-alert>
            @enderror
        </div>

        <!-- Description in Arabic -->
        <div class="form-group mb-3">
            <label for="desc_ar">Description (Arabic):</label>
            <input type="text" class="form-control" id="desc_ar" name="desc_ar" value="{{ old('desc_ar') }}" required>
            @error('desc_ar')
            <x-alert type="danger" :message="$message"></x-alert>
            @enderror
        </div>

        <!-- Category Store -->
        <div class="form-group mb-3">
            <label for="categoryStore_id">Category Store:</label>
            <select class="form-control" id="categoryStore_id" name="categoryStore_id" required>
                <option value="">-- Select Category Store --</option>
                @foreach(App\Models\CategoryStore::all() as $store)
                    <option value="{{ $store->id }}" {{ old('categoryStore_id') == $store->id ? 'selected' : '' }}>
                        {{ $store->name_en }}
                    </option>
                @endforeach
            </select>
            @error('categoryStore_id')
            <x-alert type="danger" :message="$message"></x-alert>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="form-group mb-3">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" required>
            @error('image')
            <x-alert type="danger" :message="$message"></x-alert>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Template</button>
    </form>


</x-layouts>