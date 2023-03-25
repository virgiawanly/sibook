<?php

namespace App\Http\Controllers;

use App\DataTables\BookDataTable;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class BookController extends Controller
{
    public function index(Request $request, BookDataTable $dataTable): mixed
    {
        if ($request->ajax()) {
            return $dataTable->with('category_id', $request->category_id)->render();
        }

        $table = $dataTable->html();
        return view('books.index', ['table' => $table]);
    }

    public function create(): View
    {
        return view('books.form');
    }

    public function store(StoreBookRequest $request)
    {
        try {
            $payload = $request->validated();
            $payload['stock'] = $request->filled('stock') ? $request->stock : 0;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imgPath = config('files.book_image_dir');
                $imgExt = $file->extension();
                $imgName = Str::slug($request->name . "-" . uniqid()) . "." . $imgExt;
                Storage::putFileAs($imgPath, $file, $imgName);

                $payload['image'] = $imgName;
            }

            Book::create($payload);

            return redirect()->route('books.index')
                ->with('success', 'Berhasil!')
                ->with('success_message', 'Buku berhasil ditambahkan.');
        } catch (Throwable $th) {
            return redirect()->route('books.index')
                ->with('error', 'Gagal!')
                ->with('error_message', env('APP_DEBUG') ? $th->getMessage() : 'Terjadi kesalahan pada sistem.');
        }
    }

    public function show(Book $book)
    {
        return view('books.detail', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        return view('books.form', ['book' => $book]);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        try {
            $payload = $request->validated();
            $payload['stock'] = $request->filled('stock') ? $request->stock : 0;

            if ($request->file('image')) {
                // Store new image
                $file = $request->file('image');
                $imgPath = config('files.book_image_dir');
                $imgExt = $file->extension();
                $imgName = Str::slug($request->name . "-" . uniqid()) . "." . $imgExt;
                Storage::putFileAs($imgPath, $file, $imgName);

                // Remove old image
                $oldImgPath = config('files.book_image_dir') . "/" . $book->image;
                Storage::delete($oldImgPath);

                $payload['image'] = $imgName;
            }

            $book->update($payload);

            return redirect()->route('books.index')
                ->with('success', 'Berhasil!')
                ->with('success_message', 'Buku berhasil diupdate.');
        } catch (Throwable $th) {
            return redirect()->route('books.index')
                ->with('error', 'Gagal!')
                ->with('error_message', env('APP_DEBUG') ? $th->getMessage() : 'Terjadi kesalahan pada sistem.');
        }
    }

    public function destroy(Request $request, Book $book): RedirectResponse|JsonResponse
    {
        $book->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => 'Berhasil!',
                'success_message' => 'Data buku berhasil dihapus.'
            ]);
        }

        return redirect()->route('books.index')
            ->with('success', 'Berhasil!')
            ->with('success_message', 'Data buku berhasil dihapus.');
    }
}
