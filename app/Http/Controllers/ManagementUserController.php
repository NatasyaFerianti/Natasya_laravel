<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    public function index() 
    {
       //return "Halo ini adalah method index, dalam controller management user";
       //return "Method ini akan digunakan untuk mengambil semua data user";

       //Acara 6
       $name = "Natasya Septia Ferianti";
       $pelajaran = ["Jaringan Komputer", "Pemograman web", "Kalkulus"];

       return view('home', compact('name', 'pelajaran'));
    }

    public function create() {
        return "Method ini digunakan untuk menambah data user dari form";
    }

    public function store(Request $request) {
        return "digunakan untuk menciptakan data user yang baru";
    }

    public function show($id) {
        return "digunakan untuk mengambil satu data user dengan id=" . $id;
    }

    public function edit($id) {
        return "digunakan untuk mengubah data dari form dengan id=" . $id;
    }

    public function update(Request $request, $id) {
        return "digunakan untuk mengubah data user dengan id=" . $id;
    }

    public function destroy($id) {
        return "digunakan untuk menghapus data user dengan id=" . $id;
    }
}
