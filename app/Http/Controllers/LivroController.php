<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    //  listar todos os livros
    public function index()
    {
        $livros = Livro::all();
        return view('excluirlivros', ['livros' => $livros]);
    }

    //  armazenar um novo livro
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'arquivo_pdf' => 'required|mimes:pdf|max:10000', // limite de 10 MB
            'imagem' => 'nullable|mimes:jpeg,png,jpg|max:2048', // limite de 2 MB
        ]);

        $pdfPath = $request->file('arquivo_pdf')->store('livros_pdf', 'public');
        $imagemPath = $request->hasFile('imagem') ? $request->file('imagem')->store('livros_imagens', 'public') : null;

        $livro = Livro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'arquivo_pdf' => $pdfPath,
            'imagem' => $imagemPath,
        ]);

        return response()->json($livro, 201);
    }

    public function editar($id)
    {
    $livro = Livro::find($id);
    if (!$livro) {
        return redirect()->route('dashboard')->with('error', 'Livro não encontrado.');
    }
    return view('edit', compact('livro'));
    }

    // atualizar um livro
    public function atualizar(Request $request)
    {
        $livro = Livro::findOrFail($request->id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'arquivo_pdf' => 'nullable|mimes:pdf|max:10000', 
            'imagem' => 'nullable|mimes:jpeg,png,jpg|max:2048', // limite de 2 MB
        ]);

        if ($request->hasFile('arquivo_pdf')) {
            Storage::delete($livro->arquivo_pdf);
            $pdfPath = $request->file('arquivo_pdf')->store('livros_pdf');
            $livro->arquivo_pdf = $pdfPath;
        }

        if ($request->hasFile('imagem')) {
            if ($livro->imagem) {
                Storage::delete($livro->imagem);
            }
            $imagemPath = $request->file('imagem')->store('livros_imagens');
            $livro->imagem = $imagemPath;
        }

        $livro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'arquivo_pdf' => $livro->arquivo_pdf, 
            'imagem' => $livro->imagem,
        ]);
        return redirect();
    }

    //  mostrar um livro específico
    public function show($id)
    {
        $livro = Livro::findOrFail($id); 
        return view('livrosview', compact('livro')); 
    }

    // Método para deletar um livro
    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        Storage::delete($livro->arquivo_pdf);
        if ($livro->imagem) {
            Storage::delete($livro->imagem);
        }
        $livro->delete();
        return response()->json(null, 204);
    }

    public function download($id)
    {
        $livro = Livro::findOrFail($id);
        $path = storage_path('app/public/' . $livro->arquivo_pdf);

        if (file_exists($path)) {
            return response()->download($path);
        }
        abort(404, 'Arquivo não encontrado.');
    }
}
