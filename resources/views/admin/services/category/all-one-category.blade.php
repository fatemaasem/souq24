
<x-layouts title="All {{$categoryName}} Services" :templates="$services" :>
@push('action')
<x-action actionRoute="services.create" deleteRoute="services.delete.all"  createName="Create Service"/>
@endpush
   		<!--begin::Section-->
           <div class="mb-17">
											<!--begin::Content-->
											<div class="d-flex flex-stack mb-5">
												<!--begin::Title-->
												<h3 class="text-dark">Hottest Bundles</h3>
												<!--end::Title-->
												<!--begin::Link-->
												<a href="#" class="fs-6 fw-bold link-primary">View All Offers</a>
												<!--end::Link-->
											</div>
											<!--end::Content-->
											<!--begin::Separator-->
											<div class="separator separator-dashed mb-9"></div>
											<!--end::Separator-->
											<!--begin::Row-->
											<div class="row g-10">
											
                                            	
                                            
                                            @foreach($services as $service)
											<!--begin::Col-->
<div class="col-md-4">
    <!--begin::Hot sales post-->
    <div class="card-xl-stretch mx-md-3">
        <!--begin::Overlay-->
        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" >
            <!--begin::Image-->
         
            <img src="{{url($service->image_url)}}"width="300" height="200" alt="Service Image"/>
            <!--end::Image-->

        </a>
        <!--end::Overlay-->
        <!--begin::Body-->
        <div class="mt-5">
            <!--begin::Title-->
            <a href="#" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{ $service->title_en }}</a>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">{{ $service->desc_en }}</div>
            <!--end::Text-->
            <!--begin::Text-->
            <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                <!--begin::Label-->
                <span class="badge border border-dashed fs-2 fw-bolder text-dark p-2">
                <span class="fs-6 fw-bold text-gray-400">$</span>27</span>
                <!--end::Label-->
                <!--begin::Action-->
                <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this template?')">
                        Delete
                    </button>
                </form>
                <!--end::Action-->
            </div>
            <!--end::Text-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Hot sales post-->
</div>
<!--end::Col-->

											
                                                @endforeach
											</div>
											<!--end::Row-->
										</div>
										<!--end::Section-->
</x-layouts>