<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatBotController extends Controller
{
    public function index()
    {
        // Dapatkan sesi percakapan dari sesi pengguna, atau mulai dengan pesan awal
        $context = session()->get('chat', [['role' => 'assistant', 'content' => 'Halo! Ada yang bisa saya bantu?']]);
        
        return view('chatBot', compact('context'));
    }

    public function processChat(Request $request)
    {
        $content = $request->input('content');
        
        // Validasi apakah input kosong
        if (empty($content)) {
            return redirect()->route('mahasiswa.chatbot')->with('error', 'Pesan tidak boleh kosong.');
        }

        // Dapatkan sesi percakapan atau inisialisasi jika belum ada
        $context = session()->get('chat', [['role' => 'assistant', 'content' => 'Halo! Ada yang bisa saya bantu?']]);
        
        // Tambahkan pesan pengguna ke konteks
        $context[] = ['role' => 'user', 'content' => $content];

        // Ambil API Key dari .env
        $yourApiKey = getenv('OPENAI_API_KEY');
        if (!$yourApiKey) {
            return redirect()->route('mahasiswa.chatbot')->with('error', 'API Key tidak ditemukan.');
        }

        // Buat client OpenAI
        $client = OpenAI::client($yourApiKey);

        // Kirim konteks ke API ChatGPT
        $response = $client->chat()->create([
            'model' => 'gpt-4',
            'messages' => $context
        ]);

        // Tambahkan respon ChatGPT ke konteks sebagai asisten
        foreach ($response->choices as $result) {
            $context[] = ['role' => 'assistant', 'content' => $result->message->content];
        }

        // Simpan konteks percakapan di sesi
        session(['chat' => $context]);

        return redirect()->route('mahasiswa.chatbot');
    }
}