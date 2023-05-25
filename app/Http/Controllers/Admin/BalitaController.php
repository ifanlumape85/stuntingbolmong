<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BalitaRequest;
use App\Models\Balita;
use App\Models\Propinsi;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BalitaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:balita-list|balita-create|balita-edit|balita-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:balita-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:balita-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:balita-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.balita.index');
    }

    public function getData()
    {
        $items = Balita::select(['balita.id', 'balita.created_at', 'balita.nama', 'puskesmas.nama as puskesmas', 'kelurahan.nama as kelurahan'])
            ->join('puskesmas', 'balita.id_puskesmas', '=', 'puskesmas.id')
            ->join('kelurahan', 'balita.id_kelurahan', '=', 'kelurahan.id')
            ->orderBy('balita.id', 'desc');

        return DataTables::of($items)
            ->addColumn('action', function ($row) {
                $btn = '<a href="/admin/balita/' . $row->id . '/edit" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a> <a href="javascript:void(0)" title="Hapus" onclick="delete_data(' . "'" . $row->id . "'" . ')" class="btn btn-danger"><i class="fas fa-trash"></i></a>';
                return $btn;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ? with(new Carbon($row->created_at))->format('m/d/Y') : '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Balita();
        $propinsis = Propinsi::all();
        return view('pages.balita.create', compact('item', 'propinsis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BalitaRequest $request)
    {
        $data = $request->all();
        Balita::create($data);
        session()->flash('success', 'Item was created.');
        return redirect()->route('balita.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Balita::findOrFail($id);
        $propinsis = Propinsi::all();
        return view('pages.balita.edit', compact('item', 'propinsis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BalitaRequest $request, $id)
    {
        $data = $request->all();
        $item = Balita::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'Item was updated.');
        return redirect()->route('balita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Balita::findOrFail($id);
        $item->delete();
        return response()->json(['success' => 'Item deleted successfully']);
    }

    public function getList(Request $request)
    {
        $id_puskesmas = $request->id_puskesmas ?? null;
        $id_kelurahan = $request->id_kelurahan ?? null;
        $items = Balita::where(function ($query) use ($id_puskesmas) {
            return $id_puskesmas != "" ?
                $query->where('id_puskesmas', $id_puskesmas) : '';
        })->where(function ($query) use ($id_kelurahan) {
            return $id_kelurahan != "" ?
                $query->where('id_kelurahan', $id_kelurahan) : '';
        })->get();
        $html = '<option>Choose One</option>';
        foreach ($items as $item) {
            $html .= '<option value="' . $item->id . '">' . $item->nama . '</option>';
        }
        echo $html;
    }
}
