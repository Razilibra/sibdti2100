<?php
namespace App\Http\Controllers;

use PDF;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
use App\Imports\BarangImport;
use Maatwebsite\Excel\Facades\Excel;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF()
    {
        $barang = Barang::all();

        // Setup PDF
        $pdf = PDF::loadView('admin.barang.pdf', compact('barang'));

        // Set judul dan header untuk PDF
        $pdf->getDomPDF()->getOptions()->set('title', 'Data Barang');
        $pdf->getDomPDF()->set_option('defaultMediaType', 'all');
        $pdf->setPaper('A4', 'landscape');

        // Unduh PDF
        return $pdf->download('data_barang.pdf');
    }

    public function export()
    {
        return Excel::download(new BarangExport, 'barang.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new BarangImport, $request->file('file')->store('temp'));

        return back()->with('success', 'Barang imported successfully.');
    }
    public function index(Request $request)
    {
        $title="Daftar Stok Barang";

        $barang = Barang::all();
        $role = session('role');
        $showEntries = $request->input('showEntries', 10);
        $barang = Barang::paginate($showEntries);
        return view('admin.barang.index', compact('barang','showEntries','title','title','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Daftar Stok Barang";
        $role = session('role');
        return view('admin.barang.create',compact('title','role'));;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|integer',
            'posisi'=>'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $fileName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
            $data['foto'] = $fileName;
        }

        Barang::create($data);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        $title="Daftar Stok Barang";
        $role = session('role');
        return view('admin.barang.show', compact('barang','title','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $title="Daftar Stok Barang";
        $role = session('role');
        return view('admin.barang.edit', compact('barang','title','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
{
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'kode_barang' => 'required|string|max:255',
        'stok' => 'required|integer',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'status' => 'required|integer',
        'posisi'=>'required|string|max:255',
    ]);

    $data = $request->all();

    if ($request->hasFile('foto')) {
        // Delete the old image if exists
        if ($barang->foto && file_exists(public_path('images').'/'.$barang->foto)) {
            unlink(public_path('images').'/'.$barang->foto);
        }

        $fileName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $fileName);
        $data['foto'] = $fileName;
    }

    $barang->update($data);

    return redirect()->route('barang.index')->with('success', 'Barang updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        if ($barang->foto) {
            unlink(public_path('images').'/'.$barang->foto);
        }

        $barang->delete();

        return redirect()->route('barang.index')
                         ->with('success', 'Barang deleted successfully.');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $barang = Barang::where('nama_barang', 'like', "%$keyword%")
                        ->orWhere('kode_barang', 'like', "%$keyword%")
                        ->paginate(10);
        $title="Daftar Stok Barang";
        $role = session('role');
        return view('admin.barang.index', compact('barang','title','role'));
    }

}
