<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Spatie\Html\Elements\Form;
use App\Models\Cust;
use Redirect;
use Request;

class CustController extends Controller
{
    //
	public function showAll()
	{
		$dataCust = Cust::all();
		return view('cust/display', ["cust" => $dataCust]);
	}

	public function deleteId($id)
	{
		$dataCust = Cust::findOrFail($id);
		$dataCust->delete();
		return redirect::to('cust/display')->with('message',$dataCust->id.' sudah dihapus');
	}

	public function editId($id)
	{
		$dataCust = Cust::findOrFail($id);
		return view::make('cust/edit')->with('cust',$dataCust);
	}

	public function saveId()
	{
		$dataCust = array('name' => Request::get('name'));
		$id = Request::get('id');
		Cust::where("id", $id)->update($dataCust);
		return redirect::to('cust/display')->with('message',$id.' sudah diedit');
	}
}
