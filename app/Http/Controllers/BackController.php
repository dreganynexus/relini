<?php

namespace App\Http\Controllers;

use App\Models\BackModel;
use App\Models\BackupData;
use App\Models\Debt;
use App\Models\PayModel;
use App\Models\Review;
use App\Models\salersend;
use App\Models\Upload;
use App\Models\Usage;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;

use function PHPUnit\Framework\once;

class BackController extends Controller
{

    public function sheet(){
        $count = Review::count('quantity');
        $get = Upload::orderBy('stockName')->get();



        //debt

        // Retrieve the first date from the salersend model
        $firstDate = Salersend::orderBy('created_at')->value('created_at');

        // Retrieve all debts from the first date
        $debtFromDate = Debt::whereDate('created_at', '>=', $firstDate)->get();

        // Calculate sum and count for the debts from the first date
        $sumFromFirstDate = $debtFromDate->sum('amount');
        $countFromFirstDate = $debtFromDate->count();
        // return $firstDate;
        // return $sumFromFirstDate;

        $debt = Debt::all();
        $summ = Debt::sum('amount');
        $countt = Debt::count('id');


        // Retrieve all debts from the first date
        $usageFromDate = Usage::whereDate('created_at', '>=', $firstDate)->get();
        //usage
        $usage = Usage::all();
        $sumi = Usage::sum('amount');

        // Calculate sum and count for the debts from the first date
        $sumUsageFromFirstDate = $usageFromDate->sum('amount');
        $countFromFirstDate = $debtFromDate->count();
        // return view('Back.Usage_debts', compact('usage', 'sum', 'count', 'summ', 'debt', 'countt'));

        // Retrieve the first date from the salersend model
        $firstDate = Salersend::orderBy('created_at')->value('created_at');

        // Retrieve debts from the first date where the name is similar to 'lipa namba'
        $lipanamba = Debt::whereDate('created_at', '>=', $firstDate)
            ->where('name', 'like', '%Lipa%')
            ->get();
        $sumlipanamba = $lipanamba->sum('amount');
        // return $lipanamba;


        return view('Back.sheet', compact('sumlipanamba','get','count'));


    }




    public function salersend(Request $request, $id)
    {
        // Find the original stock record
        $originalStock = Upload::find($id);

        // Check if the stock exists
        if ($originalStock) {
            // Calculate the new quantity after selling
            $remainingQuantity = $originalStock->numberOfStocks - $request->quantity;

            // Check if the remaining quantity is not negative
            if ($remainingQuantity >= 0) {
                // Update the original stock record with the remaining quantity
                $originalStock->update(['numberOfStocks' => $remainingQuantity]);

                // Create a new record for the sale
                $saleRecord = new salersend;
                $saleRecord->stockName = $originalStock->stockName;
                $saleRecord->stockPrice = $originalStock->stockPrice;
                $saleRecord->numberOfStocks = $request->quantity;  // This line is setting numberOfStocks, not quantity
                $saleRecord->quantity = $request->quantity;  // Set the quantity field
                $amount = $request->quantity * $originalStock->stockPrice;
                $saleRecord->amount = $amount;
                $saleRecord->save();


                return redirect()->back();
            } else {
                // Handle the case where the remaining quantity would be negative
                return redirect()->back()->with('error', 'Not enough stock available for the sale.');
            }
        } else {
            // Handle the case where the stock with the given ID is not found
            return redirect()->back()->with('error', 'Stock not found.');
        }
    }




public function admin_view(){
    // $come=Upload::all();
        $come = Upload::orderBy('stockName')->get();

    return view('Back.admin_view',compact('come'));
}

    public function admin($id)
    {
        $come=Upload::find($id);
        // $come = Upload::all();
        return view('Back.admin', compact('come'));
    }

public function delete_stock($id){
    $delete=Upload::find($id);
    $delete->delete();
    return redirect()->back()->with('delete','sucessfully deleted');
}

public function update_stock(request $request,$id){
        // $come=Upload::all();
        // $update=Upload::find($id);
        // $update=new Upload;
        //     $update->stockName = $request->stockName;
        //     $update->numberOfStocks = $request->numberOfStocks;
        //     $update->stockPrice = $request->stockPrice;
        //     $update->update();
        //     return redirect()->back()->with('update', 'sucessfully updated');

        $sales = Upload::find($id)->update($request->all());

        return  redirect()->back();

}

    public function sold_producti()
    {
        $product = salersend::orderBy('created_at', 'desc')->get();
        // $product=salersend::all();
        $sum = salersend::sum('amount');
        $count = salersend::sum('quantity');
        // die($count);

        //debt

        // Retrieve the first date from the salersend model
        $firstDate = Salersend::orderBy('created_at')->value('created_at');

        // Retrieve all debts from the first date
        $debtFromDate = Debt::whereDate('created_at', '>=', $firstDate)->get();

        // Calculate sum and count for the debts from the first date
        $sumFromFirstDate = $debtFromDate->sum('amount');
        $countFromFirstDate = $debtFromDate->count();
        // return $firstDate;
        // return $sumFromFirstDate;

        $debt = Debt::all();
        $summ = Debt::sum('amount');
        $countt = Debt::count('id');


        // Retrieve all debts from the first date
        $usageFromDate = Usage::whereDate('created_at', '>=', $firstDate)->get();
        //usage
        $usage = Usage::all();
        $sumi = Usage::sum('amount');
        // $count = Usage::count('id');
        // Calculate sum and count for the debts from the first date
        $sumUsageFromFirstDate = $usageFromDate->sum('amount');
        $countFromFirstDate = $debtFromDate->count();
        // return view('Back.Usage_debts', compact('usage', 'sum', 'count', 'summ', 'debt', 'countt'));

        // Retrieve the first date from the salersend model
        $firstDate = Salersend::orderBy('created_at')->value('created_at');

        // Retrieve debts from the first date where the name is similar to 'lipa namba'
        $lipanamba = Debt::whereDate('created_at', '>=', $firstDate)
            ->where('name', 'like', '%Lipa%')
            ->get();
        $sumlipanamba = $lipanamba->sum('amount');
        // return $lipanamba;

        // You can use the stream() method to display the PDF in the browser

        return view('Back.sold_producti', compact('product', 'sumlipanamba', 'sumUsageFromFirstDate', 'sum', 'count', 'usage', 'sumi', 'count', 'summ', 'sumFromFirstDate', 'debt', 'countt'));
    }

public function uncle($name){
 $debt=Debt::where('name',$name)->get();
        $den = Debt::where('name', $name)->get();
//  $name=$debt->name;
 $totalDebt=$debt->sum('amount');
    return view('Back.debtname',compact('debt','den','totalDebt'));
// return $debt;
    // die($debt);
}

public function pay(request $request,$name){
    $pay=new PayModel;
    $pay->pay=$request->pay;
// $debt = Debt::where('name', $name)->get();
die ($pay);

}

public function debtname(){
    return view('Back.debtname');
}

    public function sold_producti_pdf()
    {
        $count = Review::count('quantity');
        $get = Upload::orderBy('stockName')->get();



        //debt

        // Retrieve the first date from the salersend model
        $firstDate = Salersend::orderBy('created_at')->value('created_at');

        // Retrieve all debts from the first date
        $debtFromDate = Debt::whereDate('created_at', '>=', $firstDate)->get();

        // Calculate sum and count for the debts from the first date
        $sumFromFirstDate = $debtFromDate->sum('amount');
        $countFromFirstDate = $debtFromDate->count();
        // return $firstDate;
        // return $sumFromFirstDate;

        $debt = Debt::all();
        $summ = Debt::sum('amount');
        $countt = Debt::count('id');


        // Retrieve all debts from the first date
        $usageFromDate = Usage::whereDate('created_at', '>=', $firstDate)->get();
        //usage
        $usage = Usage::all();
        $sumi = Usage::sum('amount');

        // Calculate sum and count for the debts from the first date
        $sumUsageFromFirstDate = $usageFromDate->sum('amount');
        $countFromFirstDate = $debtFromDate->count();
        // return view('Back.Usage_debts', compact('usage', 'sum', 'count', 'summ', 'debt', 'countt'));

        // Retrieve the first date from the salersend model
        $firstDate = Salersend::orderBy('created_at')->value('created_at');

        // Retrieve debts from the first date where the name is similar to 'lipa namba'
        $lipanamba = Debt::whereDate('created_at', '>=', $firstDate)
            ->where('name', 'like', '%Lipa%')
            ->get();
        $sumlipanamba = $lipanamba->sum('amount');
        // return $lipanamba;



// Get the current timestamp
$currentTime = Carbon::now()->format('Y-m-d_H-i-s');

// Generate the filename with the current timestamp
$filename = $currentTime . '.pdf';

        // $pdf = FacadePdf::loadView('Back.sold_producti_pdf', compact('product', 'sumlipanamba', 'sumUsageFromFirstDate', 'sum', 'count', 'usage', 'sumi', 'count', 'summ', 'sumFromFirstDate', 'debt', 'countt'));
        $pdf = FacadePdf::loadView('Back.sheet', compact('get','count'));

        return $pdf->download($filename);
    }


public function verify(){
        $product = salersend::all();

        for ($i = 0; $i < $product->count(); $i++) {
            $back = new BackupData();

            $back->stockName = $product[$i]->stockName;
            $back->stockPrice = $product[$i]->stockPrice;
            $back->quantity = $product[$i]->quantity;
            $back->amount = $product[$i]->amount;
            // $bei = $product[$i]->quantity * $product[$i]->amount;
            // $back->amount = $bei;
            die($back);
            $back->save();
        }

        salersend::truncate();
        return redirect()->back();
}


    public function moveAndDeleteData()
    {
        // Retrieve records from the salersend model
        $salersendData = salersend::all();

        // Move data to the BackupData table
        foreach ($salersendData as $item) {
            BackModel::create([
                'id' => $item->id,
                'stockName' => $item->stockName,
                'stockPrice' => $item->stockPrice,
                'quantity' => $item->quantity,
                'amount' => $item->amount,
                'date' => $item->created_at,
                // Add other columns as needed
            ]);
        }

        // Delete the data from the salersend table
        salersend::truncate();

        return redirect()->back()->with('ess', 'Data moved to BackupData and deleted from Here successfully!');
    }



 public function delete_product($id){
        $delete = salersend::find($id);
        $delete->delete();
        return redirect()->back()->with('delete', 'sucessfully deleted');
 }


 public function Uploadstockk(){
        $count = Review::count('quantity');

    return view('Back.Uploadstockk',compact('count'));
 }



    public function admin_views()
    {
        $come = Upload::all();
        $come = Upload::orderBy('stockName')->get();


        return view('Back.admin_views', compact('come'));
    }



    //matumizi
    public function usage(){
        $count = Review::count('quantity');
        return view('Front.Usage',compact('count'));
    }
    public function usage_post(request $request){
      $create=new Usage;
      $create->expenses=$request->expenses;
        $create->amount = $request->amount;
    //    die($create);
        $create->save();
        return redirect()->back()->with('success','Taarifa zimetumwa kimamilifu');

    }

    public function debt(request $request)
    {
        $create = new Debt();
        $create->name = $request->name;
        $create->things = $request->things;
        $create->amount = $request->amount;
        //    die($create);
        $create->save();
        return redirect()->back()->with('successs', 'Taarifa zimetumwa kimamilifu');
    }


        public function welcome(){
        $product = salersend::orderBy('created_at')->value('created_at');
        $sum = salersend::sum('amount');
        // $date = salersend::orderBy('created_at', 'asc' )->get( );


        // $count = salersend::count('id');
            return view('welcome',compact('sum','product'));
        }


        public function Verified(){
        $product = BackModel::orderBy('created_at', 'desc')->get();
        // $product=BackModel::all();
        $sum = BackModel::sum('amount');
        $count = BackModel::count('id');


        return view('Back.Verified_data', compact('product', 'sum', 'count'));

        }

        public function usage_debt(){
            //debt
            $debt=Debt::orderBy('created_at', 'desc')->get();
        $summ = Debt::sum('amount');
        $countt = Debt::count('id');


//usage
            $usage=Usage::orderBy('created_at', 'desc')->get();
        $sum = Usage::sum('amount');
        $count = Usage::count('id');
            return view('Back.Usage_debts',compact('usage','sum','count','summ','debt','countt'));
        }

        public function delete_usage($id){
            $delete=Usage::find($id);
            $delete->delete();
            return redirect()->back()->with('delete', 'sucessfully deleted');
        }

    public function delete_debt($id)
    {
        $delete = Debt::find($id);
        $delete->delete();
        return redirect()->back()->with('deletee', 'sucessfully deleted');
    }



}
