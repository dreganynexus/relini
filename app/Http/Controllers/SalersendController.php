<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\salersend;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalersendController extends Controller
{
    //

    public function salersendd(Request $request, $id)
    {
        if(Auth::check()){

            $up = Upload::find($id);

            if (!$up) {
                return redirect()->back()->with('error', 'Product not found.');
            }

            // Check if there is enough stock
            if ($up->numberOfStocks < $request->quantity) {
                return redirect()->back()->with('error', 'Bidhaa hazipo za kutosha');
            }


            // Create a sale record
            $saleRecord = new Review();
            $saleRecord->stockName = $up->stockName;
            $saleRecord->stockPrice = $up->stockPrice;
            $saleRecord->quantity = $request->quantity;
            $amount = $request->quantity * $up->stockPrice;
            $saleRecord->amount = $amount;
            // die($saleRecord);
 
            $saleRecord->save();

            // Update the stock quantity in the Upload table
            // $up->decrement('numberOfStocks', $request->quantity);

            return redirect()->back()->with('success', 'Bidhaa imekwisha uzwa.');
        }else{
    return redirect('loginpage');

        }
    }

    public function cart(){
        $cartItems=Review::all();
        $sum=Review::sum('amount');
        $total = Review::sum('quantity');

        return view('Front.cart',compact('cartItems','sum','total'));
    }

    public function buy()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Fetch all items in the cart
            $cartItems = Review::all();

            foreach ($cartItems as $cartItem) {
                // Find the corresponding item in the Upload table
                $imageup = Upload::where('stockName', $cartItem->stockName)->first();

                // Check if the item exists in the Upload table
                if ($imageup) {
                    // Calculate the remaining quantity after purchase
                    $remain = $imageup->numberOfStocks - $cartItem->quantity;

                    // Check if there is enough stock
                    if ($remain >= 0) {
                        // Update the remaining quantity in the Upload table
                        $imageup->numberOfStocks = $remain;
                        $imageup->save();

                        // Create a sale record in the Salersend table
                        $saleRecord = new Salersend();
                        $saleRecord->stockName = $cartItem->stockName;
                        $saleRecord->stockPrice = $cartItem->stockPrice;
                        $saleRecord->quantity = $cartItem->quantity;
                        $amount = $cartItem->quantity * $cartItem->stockPrice;
                        $saleRecord->amount = $amount;
                        $saleRecord->save();
                    } else {
                        // Not enough stock available, redirect with error message
                        return redirect()->back()->with('error', 'Bidhaa hazipo za kutosha.');
                    }
                } else {
                    // Item not found in the Upload table, redirect with error message
                    return redirect()->back()->with('error', 'Bidhaa haipatikani.');
                }
            }

            // Clear the cart (Review table)
            Review::truncate();

            // Redirect with success message
            return redirect()->back()->with('success', 'Bidhaa zimeuzwa kikamilifu.');
        } else {
            // User not authenticated, redirect to login page
            return redirect('loginpage');
        }
    }

public function delete_cart($id){
        $delete_cart=Review::find($id);
        $delete_cart->delete();
        return redirect()->back()->with('delete','bidhaa imefutwa kikamilifu..');
}



    public function editStock(Request $request, $id)
    {
        if(Auth::check()){


                    // Find the stock record by ID
                    $stock = Upload::find($id);

                    // Check if the stock record exists
                    if (!$stock) {
                        return redirect()->back()->with('error', 'Stock not found.');
                    }

                    // Update the stock details
                    $stock->update([
                        'stockName' => $request->input('stockName'),
                        'stockPrice' => $request->input('stockPrice'),
                        'numberOfStocks' => $request->input('numberOfStocks'),
                        // Add other fields as needed
                    ]);

                    return redirect()->back()->with('success', 'Stock details updated successfully.');
        }else{
    return redirect('loginpage');

        }
    }


}
