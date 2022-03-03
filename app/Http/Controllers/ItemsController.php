<?php

namespace App\Http\Controllers;

use App\Company;
use App\Supplier;
use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSupplier')->only('index');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {

         return view('GetAll')->with('items',DB::table('items')
             ->where('name','like','%'.$request->search.'%')->paginate(5))->with('categories',Category::all());
    }

    public function index()
    {
        $iduser = Auth::user()->id;
        $suppliers = Supplier::all()->where('userCreate_id',$iduser);
        foreach ($suppliers as $supplier) {

            $supplierid = $supplier->id;
        }
        return view('items.index')->with('items',Item::all()->where('supplier_id',$supplierid));
    }

    public function AllItem(){
        return view('manager.AllItem')->with('items',Item::all());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

      return view('items.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $iduser = Auth::user()->id;

        $suppliers = Supplier::all()->where('userCreate_id',$iduser);
        foreach ($suppliers as $supplier) {

            $supplierid = $supplier->id;
        }
        Item::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'price' => $request->price,
            'about' => $request->about,
            'category_id' => $request->category_id,
            'image' => $request->image->store('images','public'),
            'supplier_id' => $supplierid
        ]);
        session()->flash('success','create Item successfully');
        return redirect(route('GetAll'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function GetAll()
    {
        return view('GetAll')->with('items',Item::all())->with('categories',Category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.create')->with('item',$item)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $data = $request->only(['name' , 'amount' , 'price','category_id','about']);
        if ($request->hasFile('image')){
            $image = $request->image->store('images','public');
            Storage::disk('public')->delete($item->image);
            $data['image']= $image;
        }

        $item->update($data);
        session()->flash('success','Update Item successfully');
        return redirect(route('items.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Storage::disk('public')->delete($item->image);
        $item->delete();
        return redirect(route('items.index'));
    }
}
