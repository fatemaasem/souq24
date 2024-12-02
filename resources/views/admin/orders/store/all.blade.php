
<x-layouts :storeCategories="$storeCategories" :categoryServices="$categoryServices" :categoryPosts="$categoryPosts" title="Store Orders">
   
	<!--begin::Table-->
    <div class="card card-flush mt-6 mt-xl-9">
									<!--begin::Card header-->
                                    @if(session()->has('error'))
                                        <x-alert type="danger" :message="session('error')"/>
                                    @elseif(session()->has('success'))
                                        <x-alert type="success" :message="session('success')"/>
                                    @endif
			
									<div class="card-header mt-5">
							        <!--begin::Card title-->
										<div class="card-title flex-column">
											<h3 class="fw-bolder mb-1">All Store Orders</h3>
											<div class="fs-6 text-gray-400">Total $260,300 sepnt so far</div>
										</div>
										<!--begin::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar my-1">
											<!--begin::Select-->
											<div class="me-6 my-1">
												<select id="kt_filter_year" name="year" data-control="select2" data-hide-search="true" class="w-125px form-select form-select-solid form-select-sm">
													<option value="All" selected="selected">All time</option>
													<option value="thisyear">This year</option>
													<option value="thismonth">This month</option>
													<option value="lastmonth">Last month</option>
													<option value="last90days">Last 90 days</option>
												</select>
											</div>
											<!--end::Select-->
											<!--begin::Select-->
											<div class="me-4 my-1">
												<select id="kt_filter_orders" name="orders" data-control="select2" data-hide-search="true" class="w-125px form-select form-select-solid form-select-sm">
													<option value="All" selected="selected">All Orders</option>
													<option value="Approved">Approved</option>
													<option value="Declined">Declined</option>
													<option value="In Progress">In Progress</option>
													<option value="In Transit">In Transit</option>
												</select>
											</div>
											<!--end::Select-->
											<!--begin::Search-->
											<div class="d-flex align-items-center position-relative my-1">
												<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
												<span class="svg-icon svg-icon-3 position-absolute ms-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<input type="text" id="kt_filter_search" class="form-control form-control-solid form-select-sm w-150px ps-9" placeholder="Search Order" />
											</div>
											<!--end::Search-->
										</div>
										<!--begin::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table container-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
												<!--begin::Head-->
												<thead class="fs-7 text-gray-400 text-uppercase">
													<tr>
														<th class="min-w-200px">User</th>
														<th class="min-w-100px">phone</th>

														<th class="min-w-100px">Date</th>
														<th class="min-w-90px">Category Template</th>
														<th class="min-w-90px">Status</th>
														<th class="min-w-50px text-end">Actions</th>
													</tr>
												</thead>
												<!--end::Head-->
												<!--begin::Body-->
												<tbody class="fs-6">
													@if($storeOrders->count())
													
													@else
                                                    @foreach($storeOrders as $order)
													<tr>
														<td>
															<!--begin::User-->
															<div class="d-flex align-items-center">
																<!--begin::Wrapper-->
																<div class="me-5 position-relative">
																	<!--begin::Avatar-->
																	
																	<!--end::Avatar-->
																</div>
																<!--end::Wrapper-->
																<!--begin::Info-->
																<div class="d-flex flex-column justify-content-center">
																	<a href="" class="fs-6 text-gray-800 text-hover-primary">{{$order->name}}</a>
																	<div class="fw-bold text-gray-400">{{$order->email}}</div>
																</div>
																<!--end::Info-->
															</div>
															<!--end::User-->
														</td>
														<td>{{$order->phone}}</td>
                                                        <td>{{$order->date}}</td>
														<td><a href="{{route('store-categories.view',$order->categoryStore_id)}}">{{$order->categoryStore->name_en}}</a></td>
                                                       
														<td>
                                                            @if($order->status=='rejected')
															<span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                                            @elseif($order->status=='pending')
                                                            <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                                            @elseif($order->status=='approved')
                                                            <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                                            @else
                                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                                            
                                                            @endif
                                                           
														</td>

														<td>
																	<div class="d-flex justify-content-end flex-shrink-0">
																		
                                                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 delete" data-id="{{ $order->id }}">
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                </a>


                                                                <form action="{{ route('store-order.destroy', $order->id) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" 
                                                                            onclick="return confirm('Are you sure you want to delete this order?')">
                                                                        <!-- Begin: Delete Icon -->
                                                                        <span class="svg-icon svg-icon-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3" 
                                                                                    d="M5.5 4H7H17H18.5V6H5.5V4ZM8.5 9H15.5L15.2 19H8.8L8.5 9ZM9.5 6H14.5V8H9.5V6Z" 
                                                                                    fill="currentColor" />
                                                                                <path 
                                                                                    d="M10 10H11V17H10V10ZM13 10H14V17H13V10Z" 
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                        <!-- End: Delete Icon -->
                                                                    </button>
                                                                </form>


																	</div>
																</td>
													</tr>
                                                    @endforeach
													@endif
													
													
												
													
													
												
													
												
												
													
													
													
													
													
													
													
													
													
													
													
													
													
													
													
													
													
													
												</tbody>
												<!--end::Body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Table container-->
									</div>
									<!--end::Card body-->
								</div>
</x-layouts>