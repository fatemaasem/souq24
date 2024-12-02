<x-layouts title="Create Category Template">

<form action="{{ route('store-categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- English Name -->
    <div class="form-group">
        <label for="name_en">Name (English)</label>
        <input type="text" name="name_en" id="name_en"  value="{{ old('name_en') ?? '' }}"  class="form-control" placeholder="Enter English Name" required>
        @error('name_en')
            <x-alert type="danger" :message="$message"></x-alert>
        @enderror
    </div>

    <!-- Arabic Name -->
    <div class="form-group">
        <label for="name_ar">Name (Arabic)</label>
        <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') ?? '' }}" class="form-control" placeholder="Enter Arabic Name" required>
        @error('name_ar')
            <x-alert type="danger" :message="$message"></x-alert>
        @enderror
    </div>

     <!-- Price -->
     <div class="form-group mt-3">
        <label for="price" class="form-label">Price</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" name="price" id="price" value="{{ old('price') ?? '' }}" 
                   class="form-control" placeholder="Enter Price" step="1" min="2" required>
        </div>
        @error('price')
            <x-alert type="danger" :message="$message"></x-alert>
        @enderror

    <!-- Icon Upload -->
    <div class="form-group">
        <label for="icon">Icon</label>
        <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
        @error('icon')
            <x-alert type="danger" :message="$message"></x-alert>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary mt-3">Add Category Store</button>
</form>

</x-layouts>