<?php

namespace App\Http\Controllers\Orders;

use App\Dtos\Orders\StoreDto;
use App\Helper\DefineLayouts;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Models\CategoryStore;
use App\Models\StoreOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //get all gategory stores and category service and category posts besause we use them in layout


  //function to get all request store
  public function getSroreOrders(){
    $categories=DefineLayouts::getCategories();

        $storeOrders=StoreOrder::with('categoryStore')->get();
        
        $categories['storeOrders']=$storeOrders;
     
        return view('admin.orders.store.all',$categories);
  }
 
   //function to craete order store
    public function request_store(StoreRequest $request){
      
        $dtoOrder=StoreDto::create($request);
       
      $order=StoreOrder::create($dtoOrder);
        // Define success messages in Arabic and English
        $successMessage = [
        'ar' => 'تم الطلب بنجاح. سوف نقوم بمراجعة البيانات ونتواصل معك قريبًا.',
        'en' => 'The request has been successfully submitted. We will review the information and contact you soon.',
    ];
      // Return a JSON response with the success message, order data, and status code
    return response()->json([
        'message' => $successMessage, // Multi-language success message
        'order' => $order,           // The created order
    ], 201); // Status code 201 for created resource
    }

    public function destroy($id){
        $request=StoreOrder::find($id);
        if(!$request){
          Session::flash('error','Store order not found');
        }
        else{
          Session::flash('success','Store order deleted successfully');
          $request->delete();
        }
        return redirect()->route('admin.dashboard');
    }
}
