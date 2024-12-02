
<x-layouts title="view Category" >
<div 
        class="container my-5" 
        style="
            max-width: 400px; 
            margin: 50px auto; 
            padding: 20px; 
            border: 2px solid #0d6efd; 
            border-radius: 15px; 
            text-align: center; 
            background: linear-gradient(to bottom, #ffffff, #f8f9fa); 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        " 
        onmouseover="this.style.transform='scale(1.05)'" 
        onmouseout="this.style.transform='scale(1)'"
    >
        <!-- Icon -->
        <img 
            src="{{url($categoryStore->icon_url)}}" 
            alt="Category Icon" 
            style="width: 100px; height: 100px; object-fit: contain; margin-bottom: 15px;"
        >
        <!-- English Name -->
        <h3 style="color: #0d6efd; font-weight: bold;">{{$categoryStore->name_en}}</h3>
        <!-- Arabic Name -->
        <p style="color: #6c757d; font-size: 1.2rem;">{{$categoryStore->name_ar}}</p>
        <p style="color: #6c757d; font-size: 1.2rem;">{{$categoryStore->price??""}}</p>
        <!-- Button -->
        <a href="#" class="btn btn-primary" style="margin-top: 10px;">View More</a>
    </div>



</x-layouts>