<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\PDF;

// Import the PDF facade at the top of your file

class Pdfcontroller extends Controller
{
    //
    // Import the PDF facade at the top of your file


 // app/Http/Controllers/YourControllerName.php





    // Your controller method or wherever you want to generate the PDF
    public function generatePDF()
    {
        // Replace 'your_view' with the name of the Blade view you want to convert to PDF
        $pdf = FacadePdf::loadView('Back.sold_producti',);

        // You can use the stream() method to display the PDF in the browser
        return $pdf->stream('document.pdf');
    }


    public function sold(){
        return view('Back.sold');
    }
}



