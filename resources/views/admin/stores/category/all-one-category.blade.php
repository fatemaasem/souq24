
<x-layouts title="All Templtes {{$categoryName}}" :templates="$templates" :>
@push('action')
<x-action actionRoute="templates.create" deleteRoute="store-categories.deleteAll" createName="Create Template"/>
@endpush
   		<!--begin::Section-->
           <div class="mb-17">
											<!--begin::Content-->
										
											<!--end::Content-->
											<!--begin::Separator-->
											<div class="separator separator-dashed mb-9"></div>
											<!--end::Separator-->
											<!--begin::Row-->
											<div class="row g-10">
											
                                            	
                                            
                                            @foreach($templates as $template)
											<!--begin::Col-->
<div class="col-md-4">
    <!--begin::Hot sales post-->
    <div class="card-xl-stretch mx-md-3">
        <!--begin::Overlay-->
        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" >
            <!--begin::Image-->
         
            <img src="{{url($template->image_url)}}"width="300" height="200" alt="Template Image"/>
            <!--end::Image-->

        </a>
        <!--end::Overlay-->
        <!--begin::Body-->
        <div class="mt-5">
            <!--begin::Title-->
            <a href="#" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{ $template->desc_en }}</a>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">We’ve been focused on making a the from also not been eye</div>
            <!--end::Text-->
            <!--begin::Text-->
            <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                <!--begin::Label-->
                <span class="badge border border-dashed fs-2 fw-bolder text-dark p-2">
                <span class="fs-6 fw-bold text-gray-400">$</span>27</span>
                <!--end::Label-->
                <!--begin::Action-->
                <form action="{{ route('templates.destroy', $template->id) }}" method="POST" style="display: inline;">
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