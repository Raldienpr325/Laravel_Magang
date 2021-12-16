<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\User;
use App\Models\checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

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
        ] ;
        checkout::create($datacheckout);
        DB::table('Layanans')
            ->where('id', $id)
            ->update(['stok' => $stokbaru]);
        return view('user.checkout2',compact('datacheckout'));
    }

    // public function checkoutdeal($datacheckout){
    //     // Checkout::create($datacheckout);
    //     dd($datacheckout);
    //     return view('admin.layanan.input',[
    //         'tittle' => 'input layanan'
    //     ]);
    // }

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
}