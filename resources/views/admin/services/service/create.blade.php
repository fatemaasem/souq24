<x-layouts title="Create Service">

<form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

          <!-- name in English -->
          <div class="form-group mb-3">
            <label for="name_en">Name (English):</label>
            <input type="text" class="form-control" id="name_en" name="title_en" value="{{ old('title_en') }}" required>
            @error('title_en')
            <x-alert type="danger" :message="$message"></x-alert>
            @enderror
        </div>

        <!-- Name in Arabic -->
        <div class="form-group mb-3">
            <label for="desc_ar">name (Arabic):</label>
            <input type="text" class="form-control" id="name_ar" name="title_ar" value="{{ old('title_ar') }}" required>
            @error('title_ar')
            <x-alert type="danger" :message="$message"></x-alert>
            @enderror
        </div>
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
            <label for="categoryService_id">Category Service:</label>
            <select class="form-control" id="categoryService_id" name="categoryService_id" required>
                <option value="">-- Select Category Service --</option>
                @foreach(App\Models\CategoryService::all() as $service)
                    <option value="{{ $store->id }}" {{ old('categoryService_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->name_en }}
                    </option>
                @endforeach
            </select>
            @error('categoryService_id')
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
        <button type="submit" class="btn btn-primary">Create Service</button>
    </form>


</x-layouts>