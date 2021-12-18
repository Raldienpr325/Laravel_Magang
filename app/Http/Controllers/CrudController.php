<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\User;
use App\Models\checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CrudController extends Controller
{
    //
    public function crud()
    {
        $dtlayanan = Layanan::paginate(15);
        return view('admin.crud1',[
            'tittle' => 'layanan',
        ],compact('dtlayanan'));
    }
    public function crud2()
    {
        $dtcheckout = checkout::all();
        return view('admin.crud2',compact('dtcheckout'));
    }
    public function listUser()
    {
        $listuser = User::paginate(15);
        return view('admin.list',compact('listuser'));
    }
    public function home()
    {
        return view('user.home');
    }
    public function checkout($id){
        $layanan = Layanan::findorfail($id);
        return view('user.checkout',compact('layanan'));
    }
    public function checkout2(Request $request, $id){
        $layanan2 = Layanan::findorfail($id);
        $namauser = Auth::user()->name;
        $stokbaru = $layanan2['stok'] - $request['jumlah'];
        $total = $layanan2['harga'] * $request['jumlah'];
        $perhitunganlayanan = $total + 70000 * $request['jumlah'];
        $perhitunganppn = $total * 0.1;
        $perhitunganoperasional = $total * 0.1;
        $perhitunganpembuatan = $total * 0.15;
        $perhitunganbiayatotal = $perhitunganlayanan + $perhitunganppn + $perhitunganoperasional + $perhitunganpembuatan;
        $datacheckout = [
            'nama_user' => $namauser,
            'nama_barang' => $layanan2['namabarang'],
            'waktu' => 1 * $request['jumlah'],
            'jumlah' => $request['jumlah'],
            'biaya_layanan' => $perhitunganlayanan,
            'biaya_PPN' => $perhitunganppn,
            'biaya_operasional' => $perhitunganoperasional,
            'biaya_pembuatan' => $perhitunganpembuatan,
            'biaya_total' => $perhitunganbiayatotal,
        ];
        if($stokbaru < 0){
            return redirect()->back(); //kalau stok sudah <= 0 maka gamasuk database
        }
        else{
            checkout::create($datacheckout);
            DB::table('Layanans')
            ->where('id', $id)
            ->update(['stok' => $stokbaru]);
        return view('user.checkout2',compact('datacheckout'));
        }
    }
    public function keranjang(){
        $keranjang = checkout::where('nama_user',Auth::user()->name)->get();
        $namauser = Auth::user()->name;
        if(Auth::user()->name == $keranjang){
            return redirect()->back();
        }
        else{
            return view('user.keranjang',compact('keranjang'));
        }
    }


    public function create(){
        return view('admin.layanan.input',[
            'tittle' => 'input layanan'
        ]);
    }
    public function store(Request $request)
    {
        // return $request->file('foto')->store('post-images');
       $validatedData = $request->validate([
           'foto' =>'image|file|max:5000', //kb
           'namabarang' => 'required',
           'harga' => 'required',
           'stok' => 'required',
       ]);
       if($request->file('foto')){
           $validatedData['foto'] = $request->file('foto')->store('post-images'); //manual kesimpan di storage
       }
       Layanan::create($validatedData);
       return redirect('admin-1');
    }
    public function edit($id)
    {
        $layanan=Layanan::findorfail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }
    
    public function update(Request $request, $id)
    {
        $layanan=Layanan::findorfail($id);
        $layanan->update($request->all());
        return redirect('admin-1');
    }
    public function destroy($id)
    {
        $layanan=Layanan::findorfail($id);
        $layanan->delete();
        return back()->with('toast_success', 'data berhasil dihapus!');
    }

    public function dataLayanan(){
        $datalayanan = Layanan::all();
        return view('user.home',[
            'datas' => $datalayanan,
        ]);
    }
    public function delKeranjang($id)
    {
        $delCheckout=checkout::findorfail($id);
        $tambahStok=Layanan::all();
        $stokbaru = $delCheckout['jumlah'] + $tambahStok['stok'];
        if($delCheckout->delete()){
            // checkout::create($delCheckout);
            DB::table('Layanans')
            ->where('id', $id)
            ->update(['stok' => $stokbaru]);
            return back();
        }
    } 
    
    public function diagram(){
        $dtDiagram = checkout::get();
        $categories = [];
        $data = [];
        foreach ($dtDiagram as $rek) {
            $categories[] = $rek->nama_barang;
            $data[] = $rek->jumlah;
        }
        return view('admin.diagram', ['categories' => $categories, 'data' => $data]);
    }
    public function diagram2(){
        $dtDiagram = checkout::get();
        $categories = [];
        $data = [];
        foreach ($dtDiagram as $rek) {
            $categories[] = $rek->nama_barang;
            $data[] = $rek->jumlah;
        }
        return view('admin.diagram2', ['categories' => $categories, 'data' => $data]);
    }
    
    
}